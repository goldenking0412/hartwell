<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'markets';

    protected $fillable = [
        'delta',
        'title',
        'slug',
        'image',
    ];

    public function bands()
    {
        return $this->belongsToMany('App\Models\Band')
            ->orderBy('delta');
    }

    public function banners()
    {
        return $this->belongsToMany('App\Models\Banner')
            ->orderBy('delta');
    }
}
