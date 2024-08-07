<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 5/12/2024
 * Time: 9:03 PM
 */

namespace App\Services;


use App\ClubCart;
use App\Mail\NewScheduleMail;
use Illuminate\Support\Facades\Mail;

class HomeService
{
    public function __construct()
    {
    }

    /**
     * Send email administration of the fitness club
     *
     * @param $parameters
     */
    public function sendSignUpEmail($parameters){
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

    /**
     * @param $id
     * @return array
     */
    public function getClubCards($id){

        $ClubCards = ClubCart::where('status', 1)->where('branch_id', $id)->orderby('orderby', 'asc')->get();
        if(count($ClubCards) > 0 && (count($ClubCards) % 2 == 1)){
            $rand_key = (int)(count($ClubCards)/2);
            $ClubCards[] = $ClubCards[$rand_key];
        }

        return $ClubCards;
    }
}