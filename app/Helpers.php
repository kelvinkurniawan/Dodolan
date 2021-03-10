<?php

use App\Models\ProductAndInventory;

if(!function_exists('getInventoryUsage')){
    function getInventoryUsage($productId, $inventory_id){
        $productInventory = ProductAndInventory
            ::where('product_id' , '=', $productId)->where('inventory_id', '=', $inventory_id)->first();

        return $productInventory->usage;
    }
}

if(!function_exists('getInventoryId')){
    function getInventoryId($productId, $inventory_id){
        $productInventory = ProductAndInventory
            ::where('product_id' , '=', $productId)->where('inventory_id', '=', $inventory_id)->first();

        return $productInventory->id;
    }
}
