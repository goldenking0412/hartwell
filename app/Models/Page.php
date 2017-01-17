<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
    ];

    public function bands()
    {
        return $this->hasMany('App\Models\Band')->orderBy('delta');
    }

    public function banners()
    {
        return $this->hasMany('App\Models\Banner')->orderBy('delta');
    }
}
