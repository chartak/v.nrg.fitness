<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentCategory extends Model
{
    use SoftDeletes;

    public $table = 'content_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'branch_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categoryContentPages()
    {
        return $this->belongsToMany(ContentPage::class);
    }

    public function branch()
    {
        return $this->belongsTo(ContactContact::class, 'branch_id');
    }
}
