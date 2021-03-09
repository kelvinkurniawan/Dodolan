<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description', 'stock', 'unit', 'photo', 'created_by'];

    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::query()
                ->where(function($q) use ($query) {
                    $q->where('name', 'LIKE', '%'. $query . '%');
                });
    }
}
