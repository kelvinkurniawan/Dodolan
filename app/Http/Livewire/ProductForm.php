<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductForm extends Component
{

    public $productId;
    public $name;
    public $description;
    public $price;
    public $stock;

    protected $listeners = ['triggerEdit'];

    public function render()
    {
        return view('livewire.product-form');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|min:5',
            'description' => '',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

        if($this->productId){
            Product::find($this->productId)
                ->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'price' => $this->price,
                    'stock' => $this->stock
                ]);

            $this->dispatchBrowserEvent('product-saved', ['action' => 'updated', 'product_name' => $this->name]);

        }else{
            Product::create(array_merge($validated, [
                'created_by' => Auth::id()
            ]));

            $this->dispatchBrowserEvent('product-saved', ['action' => 'created', 'product_name' => $this->name]);
        }
        $this->emitTo('product-table', 'triggerRefresh');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->productId = null;
        $this->name = null;
        $this->description = null;
        $this->price = null;
        $this->stock = null;
    }

    public function triggerEdit($product)
    {
        $this->productId = $product['id'];
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->stock = $product['stock'];

        $this->emit('dataFetched', $product);
    }

}
