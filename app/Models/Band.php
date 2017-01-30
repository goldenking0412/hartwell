<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bands';

    protected $fillable = [
        'page_id',
        'type',
        'image',
        'floating',
        'body',
        'body_2',
        'body_3',
        'delta',
        'background',
        'map',
        'section',
    ];

    public function bandImages()
    {
        return $this->belongsToMany('App\Models\BandImage');
            //->orderBy('delta');
    }
}
