<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAndInventory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'inventory_id', 'usage'];
    protected $table = 'inventory_product';
    protected $maps = [
        'product_id' => 'productId',
        'inventory_id' => 'inventoryId',
        'usage' => 'usage'
    ];

}
