<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'representative_name',
        'street_address'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
