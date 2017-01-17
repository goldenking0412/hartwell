<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'delta',
        'teaser',
    ];
}
