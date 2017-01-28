<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BandImage extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'band_images';

    protected $fillable = [
        'image',
    ];
}
