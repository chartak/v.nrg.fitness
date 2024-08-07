<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 5/13/2024
 * Time: 11:02 PM
 */

namespace App\Services;


use App\TrainingSchedule;

class TrainingScheduleService
{
    /**
     * @param array $whereStatement
     * @return array|mixed
     */
    public function getTrainingScheduleList($whereStatement = array()){

        if(empty($whereStatement)){
            $arrSchedule = TrainingSchedule::where('status','enabled')
                ->where('branch_id',session()->get('baseInfo')->id)
                ->orderby('day_of_week','asc')->orderby('time', 'asc')->get();
        } else {
            $arrSchedule = TrainingSchedule::where('status', 'enabled')
                ->where('branch_id', session()->get('baseInfo')->id)
                ->where($whereStatement)
                ->orderby('day_of_week', 'asc')->orderby('time', 'asc')->get();
        }
        if(!empty($arrSchedule)){
            return $this->buildScheduleDate($arrSchedule);
        } else {
            return [];
        }
    }

    /**
     * @param $arrSchedule
     * @param bool $signupType
     * @return array|mixed
     */
    private function buildScheduleDate($arrSchedule, $signupType = false){
        $arr_training_schedule =[];
        foreach ($arrSchedule as $key => $value) {

            $arr_training_schedule[$value->day_of_week][] = array(
                'training_sch_id' => $value->id,
                'training_name' => $value->training_name,
                'time' => $value->time,
                'trainer_name' => $value->treainer->fullname,
                'day' => $value->day_of_week,
                'pay' => $value->pay_type_training,
                'stock' => $value->stock_id
            );
        }

        //date_default_timezone_set('UTC');
        $start_date = date("Y-m-d");
        $end_date = date("Y-m-d", strtotime("+7 days", strtotime($start_date)));
        $dateDiff = $this->dateDiff($start_date,$end_date);
        $arr_training_schedule_package = [];

        for($j=1; $j <= $dateDiff; $j++){
            if (strtotime($start_date) <= strtotime($end_date)) {
                $timestamp = strtotime($start_date);
                $day = date('F', $timestamp);
                $day_ = date('l', $timestamp);
                $dd = date("d", strtotime($start_date)) . " " . $day;
                $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            }

            $day_of_week = date('N', strtotime($dd));
            //$yy = $this->dateToRussian($dd." ". $day_, 'd l F');
            $day_name = $this->dateToRussian($dd, 'd F');

            if(isset($arr_training_schedule[$day_of_week])) {
                if($signupType) {
                    $arr_training_schedule[$day_of_week][0]['day_month'] = ($this->dateToRussian($dd, 'l')) . ", " .$day_name;
                    $arr_training_schedule_package = $arr_training_schedule[$day_of_week];
                } else{
                    $arr_training_schedule_package[$day_name . "-" . ($this->dateToRussian($dd, 'l'))] = $arr_training_schedule[$day_of_week];
                }
            } else {
                if(!$signupType) {
                    if (empty($whereStatement))
                        $arr_training_schedule_package[$day_name . "-" . ($this->dateToRussian($dd, 'l'))] = [];
                }
            }
        }
        return $arr_training_schedule_package;
    }

    /**
     * @param $date1
     * @param $date2
     * @return float
     */
    private function dateDiff($date1, $date2)
    {
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }

    /**
     * @param $date
     * @param $format
     * @return mixed
     */
    private function dateToRussian($date, $format)
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $russian_days = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $russian_months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октября', 'Ноябрь', 'Декабрь');
        return str_replace($english_months, $russian_months, str_replace($english_days, $russian_days, date($format, strtotime($date) ) ) );
    }

    /**
     * @param $arrFilters
     * @return array|mixed
     */
    public function scheduleTrainingFilter($arrFilters)
    {
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

        return $this->getTrainingScheduleList($whereSer);
    }

    /**
     * @param $schedule_id
     * @return array|mixed
     */
    public function SignUpTrainingSchedule($schedule_id){
        $arrTrainingSchedule = TrainingSchedule::where('id', $schedule_id)->get();

        if(!empty($arrTrainingSchedule)){
            return $this->buildScheduleDate($arrTrainingSchedule, true);
        } else {
            return [];
        }
    }
}