<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description', 'stock', 'price', 'created_by'];

    public function inventory(){
        return $this->belongsToMany('App\Models\Inventory');
    }

    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }

    public static function search($query)
    {
        return empty($query) ? static::with('inventory', 'category')
            : static::with('inventory', 'category')
                ->where(function($q) use ($query) {
                    $q->where('name', 'LIKE', '%'. $query . '%');
                });
    }
}
