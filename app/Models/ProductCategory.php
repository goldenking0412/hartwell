<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    protected $fillable = [
        'delta',
        'title',
        'image',
        'slug',
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
