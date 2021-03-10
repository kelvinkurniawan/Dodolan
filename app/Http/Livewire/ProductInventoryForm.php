<?php

namespace App\Http\Livewire;

use App\Models\ProductAndInventory;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Livewire\Component;
use Livewire\Request;

class ProductInventoryForm extends Component
{

    public $productInventoryId;
    public $product_id;
    public $inventory_id;
    public $usage;

    protected $listeners = ['setProductAndInventory'];

    public function setProductAndInventory($productId, $inventoryId){
        $this->product_id = $productId;
        $this->inventory_id = $inventoryId;
    }


    public function save()
    {
        $validated = $this->validate([
            'product_id' => 'required',
            'inventory_id' => 'required',
            'usage' => 'integer|required'
        ]);

        if($this->productInventoryId){
            ProductAndInventory::find($this->productInventoryId)->update([
                'usage' => $this->usage
            ]);
        }else{
            ProductAndInventory::create($validated);
            $this->dispatchBrowserEvent('item-added', ['action' => 'added']);
        }

        $this->emitTo('product-inventory', 'triggerRefresh');

    }

    public function render()
    {
        return view('livewire.product-inventory-form');
    }
}
