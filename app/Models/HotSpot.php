<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotSpot extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hot_spots';

    protected $fillable = [
        'text',
        'link',
        'x',
        'y',
    ];
}
