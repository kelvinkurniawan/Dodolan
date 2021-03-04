<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';

    public function inventory(){
        return $this->belongsToMany('App\Models\Inventory');
    }

    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }
}
