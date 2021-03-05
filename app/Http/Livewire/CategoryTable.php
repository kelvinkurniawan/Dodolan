<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
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
        $category = Category::find($id);
        $category->delete();

        $this->dispatchBrowserEvent('item-deleted', ['item_name' => $category->name]);
    }

    public function render()
    {
        return view('livewire.category-table', [
            'categories' => Category::search($this->search)
                ->orderBy($this->sortField,  $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate(10)
        ]);
    }
}
