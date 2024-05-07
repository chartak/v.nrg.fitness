<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Treainer extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'treainers';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fullname',
        'status',
        'orderby',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'schedule_trainer'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(80)->height(80)->keepOriginalImageFormat();
        $this->addMediaConversion('l')->format('png');
        $this->addMediaConversion('l')->format('webp');
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

    public function types()
    {
        return $this->belongsToMany(TypeOfTrainer::class);
    }

    public function branches()
    {
        return $this->belongsToMany(ContactContact::class);
    }
}
