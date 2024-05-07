<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary;

class PhotoGallery extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'photo_galleries';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'status',
        'branch_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50)->keepOriginalImageFormat();
        $this->addMediaConversion('m')->format('jpg')->width(448)->height(229);
        $this->addMediaConversion('m')->format('webp')->width(448)->height(229);
        $this->addMediaConversion('l')->format('jpg');
        $this->addMediaConversion('l')->format('webp');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }

    public function branch()
    {
        return $this->belongsTo(ContactContact::class, 'branch_id');
    }
}
