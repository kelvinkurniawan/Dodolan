<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'created_by'];
    protected $dates = ['deleted_at'];

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
