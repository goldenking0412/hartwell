<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model {

    protected $fillable = [
        'name',
        'position_id',
        'email',
        'phone',
        'resume',
    ];

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
