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

}
