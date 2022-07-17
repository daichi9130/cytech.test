<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Company;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
    ];
    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
