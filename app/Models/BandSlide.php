<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BandSlide extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'band_slides';

    protected $fillable = [
        'image',
        'delta',
    ];
}
