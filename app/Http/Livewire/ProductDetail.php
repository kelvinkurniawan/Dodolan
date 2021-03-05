<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{

    public $productId;

    public function mount($productId)
    {
        $this->$productId = $productId;
    }

    public function render()
    {

        $product = Product::with(['inventory', 'category'])->findOrFail($this->productId);

        return view('livewire.product-detail', ['product' => $product]);
    }
}
