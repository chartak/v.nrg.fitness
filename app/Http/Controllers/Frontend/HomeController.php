<?php

namespace App\Http\Controllers\Frontend;


use App\ClubCart;
use App\ContactCompany;
use App\ContactContact;
use App\FrontPages;
use App\Menu;
use App\PhotoGallery;
use App\Service;
use App\SignUpTraining;
use App\Stock;
use App\TrainingSchedule;
use App\Treainer;
use App\Mail\NewScheduleMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
//use Vinkla\Instagram\Instagram;
//use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Mail;
//use Sichikawa\LaravelSendgridDriver\SendGrid;

//use Sichikawa\LaravelSendgridDriver\SendGrid;

class HomeController extends Controller
{
    //use SendGrid;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baseInfo = session()->get('baseInfo');

        $site_base = url('/');
        $arrSiteInfo = DB::table('contact_companies')
            ->join('contact_contacts', 'contact_companies.id', '=', 'contact_contacts.company_id')
            ->where('contact_companies.company_website', $site_base)
            ->select('contact_contacts.*')
            ->get();

        $yy = ContactContact::where('id', $arrSiteInfo[0]->id)->get();
        $logo_img = $yy[0]->logo->getUrl();
        $favicon = $yy[0]->favicon->getUrl();
        if (!$baseInfo) {
            session()->put('baseInfo', $arrSiteInfo[0]);
        }
        $branch_id = session()->get('baseInfo')->id;
        $arrMenus = Menu::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->get();
        $arrAbout = Menu::where('status', 1)->where('branch_id', $branch_id)->where('anchor_key', 'about')->get();
        $arrTrainerList = Treainer::where('status',1)->orderby('orderby','asc')->get();
        $arrServices = Service::where('status', 1)->where('branch_id', $branch_id)->where('special_offer', 0)->orderby('orderby', 'asc')->get();
        $arrSpecialOfferServices = Service::where('status', 1)->where('special_offer', 1)->where('branch_id', $branch_id)->get();
        $arrClubCard = ClubCart::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->get();
        if(count($arrClubCard) > 0 && (count($arrClubCard) % 2 == 1)){
            $rand_key = (int)(count($arrClubCard)/2);
            $arrClubCard[] = $arrClubCard[$rand_key];
        }
        $arrStocks = Stock::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->limit(3)->get();
        $arrGallery = PhotoGallery::where('status', 1)->where('branch_id', $branch_id)->get();
        //$strFormat = $this->checkBrowser();
        $arrWeekTrainingSchedule = TrainingSchedule::getTrainingScheduleList();

        return view('frontend/home', ['info' => $arrSiteInfo[0], 'logo' => $logo_img, 'favicon' => $favicon, 'menus' => $arrMenus, 'arrAbout' => $arrAbout, 'trainers' => $arrTrainerList, 'services' => $arrServices, 'arrWeekTrainingSchedule' => $arrWeekTrainingSchedule, 'specialOfferServices' => $arrSpecialOfferServices, 'clubcards' => $arrClubCard, 'stocks' => $arrStocks, 'phGallery' => $arrGallery]);
    }

//    private function getTrainingScheduleWeekList(){
//        $arr_training_schedule =[];
//        $arrSchedule = TrainingSchedule::where('status','enabled')->where('branch_id',session()->get('baseInfo')->id)->orderby('day_of_week','asc')->get();
//
//        return $arr_training_schedule_package;
//    }

    public function bannerSignup(Request $request)
    {
        $branch = session()->get('baseInfo');
        $request['branch_id'] = ($branch) ? $branch->id : 1;

        if(isset($request["schedule_id"])) {
            $tr_schedule = TrainingSchedule::SignUpTrainingSchedule($request["schedule_id"]);

            $request['schedule_special'] = $tr_schedule[0];
            //sent email administrator
            $this->sendSignUpEmail($request->all());
        } elseif (isset($request["visit_id"]) || isset($request["freeze_id"])) {
            //sent email administrator
            $this->sendSignUpEmail($request->all());
        } elseif (isset($request["sub_page_stock"])) {
            $this->sendSignUpEmail($request->all());
        } else {
            $signUpTraining = SignUpTraining::create($request->all());

            //sent email administrator
            $type_name_special = SignUpTraining::getType($request["type"], $request["type_id"]);
            $request['name_special'] = $type_name_special;
            $this->sendSignUpEmail($request->all());
        }
        return response()->json(true);
    }

    private function sendSignUpEmail($parameters){
        $arr_to_mails = "";
//        if(env('MAIL_TO_MANAGER')){
//            $arr_to_mails = array(env('MAIL_TO_MANAGER'));
//        }
//        if(env('MAIL_TO_MANAGER_1')){
//            $arr_to_mails[] = env('MAIL_TO_MANAGER_1');
//        }
//        if(env('MAIL_TO_MANAGER_2')){
//            $arr_to_mails[] = env('MAIL_TO_MANAGER_2');
//        }
        if(isset($parameters["freeze_id"]) && $parameters["freeze_id"] == "freeze"){
            if(env('MAIL_TO_MANAGER_FREEZE_CARD')){
                $arr_to_mails = array(env('MAIL_TO_MANAGER_FREEZE_CARD'));
            }
        } else {

            if (env('MAIL_TO_MANAGER_ALL')) {
                $arr_to_mails = explode(",", env('MAIL_TO_MANAGER_ALL'));
            }
        }

        if(!empty($arr_to_mails)) {
            Mail::to($arr_to_mails)->send(new NewScheduleMail($parameters));
        }
    }

    public function scheduleTraining(Request $request)
    {
        $arrFilters = $request->all();

        if (!empty($arrFilters)) {
            $whereSer = array();
            if (isset($arrFilters["serviceid"]) && (int)$arrFilters["serviceid"] > 0) {
                $whereSer[] = ['service_id', $arrFilters["serviceid"]];
            }
            if (isset($arrFilters["day"]) && (int)(substr($arrFilters["day"], 1, 2)) > 0) {
                $whereSer[] = ['day_of_week', (substr($arrFilters["day"], 1, 2))];
            }
            if (isset($arrFilters["trainer"]) && (int)$arrFilters["trainer"] > 0) {
                $whereSer[] = ['treainer_id', $arrFilters["trainer"]];
            }
            if (isset($arrFilters["time"]) && (int)$arrFilters["time"] > 0) {
                $s_time = substr($arrFilters["time"], 0, 2) . ':00';
                $e_time = substr($arrFilters["time"], 2, 4) . ':00';
                $whereSer[] = ['time', '>=', $s_time];
                $whereSer[] = ['time', '<=', $e_time];
            }
            if(isset($arrFilters["pay"]) && !is_numeric($arrFilters["pay"])) {
                if($arrFilters["pay"] == 'ffree'){
                    $whereSer[] = ['pay_type_training', "Бесплатно"];
                }else{
                    $whereSer[] = ['pay_type_training', "Платно"];
                }
            }
            $branch_id = session()->get('baseInfo')->id;
            $arrWeekTrainingSchedule = TrainingSchedule::getTrainingScheduleList($whereSer);
            $stocks = Stock::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->limit(3)->get();

            $returnHTML = view("frontend.trschedule", compact('arrWeekTrainingSchedule', 'stocks'))->render();

            return response()->json(array('success' => true, 'ht' => $returnHTML));
        }
    }

//    private function checkBrowser(){
//        $agent = new Agent();
//        $strBrowser = $agent->browser();
//        if($strBrowser == 'Safari' || $strBrowser == 'IE'){
//            return 'jpg';
//        }
//        return 'webp';
//    }
}
