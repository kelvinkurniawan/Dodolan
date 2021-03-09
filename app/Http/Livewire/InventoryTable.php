<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryTable extends Component
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
        $inventory = Inventory::find($id);
        $inventory->delete();

        $this->dispatchBrowserEvent('item-deleted', ['item_name' => $inventory->name]);
    }

    public function render()
    {
        return view('livewire.inventory-table', [
            'inventories' => Inventory::search($this->search)
                ->orderBy($this->sortField,  $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate(10)
        ]);
    }
}
