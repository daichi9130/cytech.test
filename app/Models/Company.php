<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'representative_name',
        'street_address'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function getList()
    {
        $companies = Company::pluck('company_name','id');
        return $companies;
    }
}
