<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'delta',
        'title',
        'slug',
        'product_category_id',
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

    public function product_category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }
}
