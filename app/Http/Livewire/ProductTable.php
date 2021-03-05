<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductTable extends Component
{

    use WithPagination;

    public $sortField = 'name';
    public $sortAsc = true;
    public $search = '';

    protected $listeners = ['delete', 'triggerRefresh' => '$refresh'];

    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        $this->dispatchBrowserEvent('product-deleted', ['product' => $product->name]);
    }

    public function render()
    {
        return view('livewire.product-table', [
            'products' => Product
                ::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate(10)
        ]);
    }
}
