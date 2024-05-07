<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Stock extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'stocks';

    protected $appends = [
        'photo',
        'photo_stock'
    ];

    protected $dates = [
        'end_date',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'status',
        'orderby',
        'end_date',
        'discounts',
        'branch_id',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(80)->height(80)->keepOriginalImageFormat();
        //$this->addMediaConversion('middle')->format('jpg')->fit('crop',352,171);
        $this->addMediaConversion('m')->format('jpg')->width(352)->height(171)->performOnCollections('photo_stock');
        $this->addMediaConversion('m')->format('webp')->width(352)->height(171)->performOnCollections('photo_stock');
        $this->addMediaConversion('l')->format('jpg')->performOnCollections('photo');
        $this->addMediaConversion('l')->format('webp')->performOnCollections('photo');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getPhotoStockAttribute()
    {
        $file = $this->getMedia('photo_stock')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function branch()
    {
        return $this->belongsTo(ContactContact::class, 'branch_id');
    }
}
