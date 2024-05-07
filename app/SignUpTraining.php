<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignUpTraining extends Model
{
    use SoftDeletes;

    public $table = 'sign_up_training';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'new'  => 'новый',
        'inprogress' => 'в процессе',
        'completed' => 'завершено',
        'canceled' => 'отменен',
    ];

    protected $fillable = [
        'type_id',
        'type',
        'type_name',
        'full_name',
        'phone',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'branch_id',
    ];

    public function branch()
    {
        return $this->belongsTo(ContactContact::class, 'branch_id');
    }

    public static function getType($type, $type_id){
        $type_name = '';
        switch($type){
            case 'Stock':
                $type_name = Stock::where('id',$type_id)->pluck('name');
                $type_name = $type_name[0];
                break;
            case 'Service':
                $type_name = Service::where('id',$type_id)->pluck('name');
                $type_name = $type_name[0];
                break;
            case 'Treainer':
                $type_name = Treainer::where('id',$type_id)->pluck('fullname');
                $type_name = $type_name[0];
                break;
            case 'ClubCart':
                $type_name = ClubCart::where('id',$type_id)->pluck('name');
                $type_name = $type_name[0];
                break;
            case 'Special Offer':
                $type_name = Service::where('id',$type_id)->pluck('name');
                $type_name = $type_name[0];
                break;
            case 'First Training':
                $type_name = 'First Training';
                break;
            default:
                $type_name = 'Menu Phone';

        }

        return $type_name;
    }
}
