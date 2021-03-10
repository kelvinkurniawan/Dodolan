<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductAndInventory;
use Livewire\Component;

class ProductInventory extends Component
{
    public $productId;

    protected $listeners = ['delete', 'triggerRefresh' => '$refresh', 'render'];

    public function mount($productId)
    {
        $this->$productId = $productId;
    }

    public function delete($id)
    {
        $inventory = ProductAndInventory::find($id);
        $inventory->delete();

        $this->dispatchBrowserEvent('item-removed');
        $this->emitTo("product-inventory" ,"triggerRefresh");
    }

    public function render()
    {
        $usedIngredient = [];
        $unUsedIngredients = [];

        $productAndInventory = ProductAndInventory::where('product_id', '=', $this->productId)->get();

        foreach ($productAndInventory as $productInventory) {
            array_push($usedIngredient, $productInventory->inventory_id);
        }

        $unUsedIngredients = Inventory::whereNotIn('id', $usedIngredient)->get();

        $product = Product::with(['inventory', 'category'])->findOrFail($this->productId);

        return view('livewire.product-inventory', [
            'product' => $product,
            'unUsedIngredients' => $unUsedIngredients
        ]);
    }
}
