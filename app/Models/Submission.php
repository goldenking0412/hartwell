<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'submissions';

    protected $fillable = [
        'name',
        'title',
        'company',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'phone',
        'fax',
        'email',
        'comments',
    ];
}
