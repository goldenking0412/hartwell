<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformCategory extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'platform_categories';

    protected $fillable = [
        'delta',
        'title',
        'image',
        'image_2',
        'banner',
        'headline',
        'slug',
        'meta_description',
    ];

    public function bands()
    {
        return $this->belongsToMany('App\Models\Band')
            ->orderBy('delta');
    }

    public function hotspots()
    {
        return $this->belongsToMany('App\Models\HotSpot');
    }

    public function banners()
    {
        return $this->belongsToMany('App\Models\Banner')
            ->orderBy('delta');
    }
}
