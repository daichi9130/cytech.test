<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
