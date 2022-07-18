<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Company;

class Product extends Model
{
    // $table変数にmigrationsにあるテーブルを指定しモデルに関連付ける
    protected $table = 'products';
    
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
