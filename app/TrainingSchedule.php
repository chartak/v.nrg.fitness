<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingSchedule extends Model
{
    use SoftDeletes;

    public $table = 'training_schedules';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PAY_TYPE_SELECT = [
        'Бесплатно'  => 'Бесплатно',
        'Платно' => 'Платно',
    ];

    const STATUS_SELECT = [
        'enabled'  => 'включено',
        'disabled' => 'выключено',
    ];

    const DAY_WEEK_SELECT = [
        '1' => 'Понедельник',
        '2' => 'Вторник',
        '3' => 'Среда',
        '4' => 'Четверг',
        '5' => 'Пятница',
        '6' => 'Суббота',
        '7' => 'Воскресенье'
    ];

    protected $fillable = [
        'service_id',
        'day_of_week',
        'treainer_id',
        'time',
        'training_name',
        'pay_type_training',
        'stock_id',
        'branch_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

//    public function typeTreainers()
//    {
//        return $this->belongsToMany(Treainer::class);
//    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function treainer()
    {
        return $this->belongsTo(Treainer::class, 'treainer_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function branch()
    {
        return $this->belongsTo(ContactContact::class, 'branch_id');
    }


    public static function getTrainingScheduleList($whereStatement = array()){

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
            return self::buildScheduleDate($arrSchedule);
        } else {
            return [];
        }
    }

    private static function buildScheduleDate($arrSchedule, $signupType = false){
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
        $dateDiff = self::dateDiff($start_date,$end_date);
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
            //$yy = self::dateToRussian($dd." ". $day_, 'd l F');
            $day_name = self::dateToRussian($dd, 'd F');

            if(isset($arr_training_schedule[$day_of_week])) {
                if($signupType) {
                    $arr_training_schedule[$day_of_week][0]['day_month'] = (self::dateToRussian($dd, 'l')) . ", " .$day_name;
                    $arr_training_schedule_package = $arr_training_schedule[$day_of_week];
                } else{
                    $arr_training_schedule_package[$day_name . "-" . (self::dateToRussian($dd, 'l'))] = $arr_training_schedule[$day_of_week];
                }
            } else {
                if(!$signupType) {
                    if (empty($whereStatement))
                        $arr_training_schedule_package[$day_name . "-" . (self::dateToRussian($dd, 'l'))] = [];
                }
            }
        }
        return $arr_training_schedule_package;
    }

    public static function dateDiff($date1, $date2)
    {
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }

    public static function dateToRussian($date, $format)
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $russian_days = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $russian_months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октября', 'Ноябрь', 'Декабрь');
        return str_replace($english_months, $russian_months, str_replace($english_days, $russian_days, date($format, strtotime($date) ) ) );
    }

    public static function SignUpTrainingSchedule($schedule_id){
        $arrTrainingSchedule = TrainingSchedule::where('id', $schedule_id)->get();

        if(!empty($arrTrainingSchedule)){
            return self::buildScheduleDate($arrTrainingSchedule, true);
        } else {
            return [];
        }
    }
}
