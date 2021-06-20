<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Products extends Model
{
    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttributes','product_id');
    }
}
