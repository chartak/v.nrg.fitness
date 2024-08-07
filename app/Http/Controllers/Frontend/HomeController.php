<?php

namespace App\Http\Controllers\Frontend;

use App\ContactContact;
use App\FrontPages;
use App\Menu;
use App\PhotoGallery;
use App\Service;
use App\Services\HomeService;
use App\Services\TrainingScheduleService;
use App\SignUpTraining;
use App\Stock;
use App\Treainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
     * @param HomeService $service
     * @param TrainingScheduleService $trScheduleService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(HomeService $service, TrainingScheduleService $trScheduleService)
    {
        $site_base = url('/');
        $arrSiteInfo = DB::table('contact_companies')
            ->join('contact_contacts', 'contact_companies.id', '=', 'contact_contacts.company_id')
            ->where('contact_companies.company_website', $site_base)
            ->select('contact_contacts.*')
            ->get();

        $contactInfo = ContactContact::where('id', $arrSiteInfo[0]->id)->get();

        if(!empty($contactInfo)) {
            $logo_img = $contactInfo[0]->logo->getUrl();
            $favicon = $contactInfo[0]->favicon->getUrl();
        }

        if (!(session()->get('baseInfo'))) {
            session()->put('baseInfo', $arrSiteInfo[0]);
        }
        $branch_id = session()->get('baseInfo')->id;

        $arrMenus = Menu::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->get();
        $arrAbout = Menu::where('status', 1)->where('branch_id', $branch_id)->where('anchor_key', 'about')->get();
        $arrTrainerList = Treainer::where('status',1)->orderby('orderby','asc')->get();
        $arrServices = Service::where('status', 1)->where('branch_id', $branch_id)->where('special_offer', 0)->orderby('orderby', 'asc')->get();
        $arrSpecialOfferServices = Service::where('status', 1)->where('special_offer', 1)->where('branch_id', $branch_id)->get();

        $arrClubCard = $service->getClubCards($branch_id);

        $arrStocks = Stock::where('status', 1)->where('branch_id', $branch_id)->orderby('orderby', 'asc')->limit(3)->get();
        $arrGallery = PhotoGallery::where('status', 1)->where('branch_id', $branch_id)->get();
        //$strFormat = $this->checkBrowser();
        $arrWeekTrainingSchedule = $trScheduleService->getTrainingScheduleList();

        return view('frontend/home', ['info' => $arrSiteInfo[0], 'logo' => $logo_img, 'favicon' => $favicon, 'menus' => $arrMenus, 'arrAbout' => $arrAbout,
                                            'trainers' => $arrTrainerList, 'services' => $arrServices, 'arrWeekTrainingSchedule' => $arrWeekTrainingSchedule,
                                            'specialOfferServices' => $arrSpecialOfferServices, 'clubcards' => $arrClubCard, 'stocks' => $arrStocks,
                                            'phGallery' => $arrGallery]
        );
    }

    /**
     * Register a subscriber for the training, club card (ajax)
     *
     * @param Request $request
     * @param HomeService $service
     * @param TrainingScheduleService $trScheduleService
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeFitnessServices(Request $request, HomeService $service, TrainingScheduleService $trScheduleService)
    {
        $branch = session()->get('baseInfo');
        $request['branch_id'] = ($branch) ? $branch->id : 1;

        if(isset($request["schedule_id"])) {
            $tr_schedule = $trScheduleService->SignUpTrainingSchedule($request["schedule_id"]);

            $request['schedule_special'] = $tr_schedule[0];
            //sent email administrator
            $service->sendSignUpEmail($request->all());
        } elseif (isset($request["visit_id"]) || isset($request["freeze_id"])) {
            //sent email administrator
            $service->sendSignUpEmail($request->all());
        } elseif (isset($request["sub_page_stock"])) {
            $service->sendSignUpEmail($request->all());
        } else {
            $signUpTraining = SignUpTraining::create($request->all());

            //sent email administrator
            $type_name_special = SignUpTraining::getType($request["type"], $request["type_id"]);
            $request['name_special'] = $type_name_special;
            $service->sendSignUpEmail($request->all());
        }
        return response()->json(true);
    }

    /**
     * Training Schedule filter action (ajax)
     *
     * @param Request $request
     * @param TrainingScheduleService $trScheduleService
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function scheduleTraining(Request $request, TrainingScheduleService $trScheduleService)
    {
        $arrFilters = $request->all();

        if (!empty($arrFilters)) {

            $arrWeekTrainingSchedule = $trScheduleService->scheduleTrainingFilter($arrFilters);

            $branch_id = session()->get('baseInfo')->id;
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

//    private function getTrainingScheduleWeekList(){
//        $arr_training_schedule =[];
//        $arrSchedule = TrainingSchedule::where('status','enabled')->where('branch_id',session()->get('baseInfo')->id)->orderby('day_of_week','asc')->get();
//
//        return $arr_training_schedule_package;
//    }
}
