<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfTrainer extends Model
{
    use SoftDeletes;

    public $table = 'type_of_trainers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'enabled'  => 'включено',
        'disabled' => 'выключено',
    ];

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function typeTreainers()
    {
        return $this->belongsToMany(Treainer::class);
    }
}
