<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InventoryForm extends Component
{

    public $inventoryId;
    public $name;
    public $description;
    public $stock;
    public $unit;
    public $photo;

    protected $listeners = ['triggerEdit'];

    public function render()
    {
        return view('livewire.inventory-form');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|min:5',
            'stock' => 'required|integer',
            'unit' => 'required',
            'photo' => '',
            'description' => ''
        ]);

        if($this->inventoryId){
            Inventory::find($this->inventoryId)
                ->update([
                    'name' => $this->name,
                    'stock' => $this->stock,
                    'unit' => $this->unit,
                    'photo' => $this->photo,
                    'description' => $this->description
                ]);

            $this->dispatchBrowserEvent('item-saved', ['action' => 'updated', 'item_name' => $this->name]);
        }else{
            Inventory::create(array_merge($validated, [
                'created_by' => Auth::id()
            ]));

            $this->dispatchBrowserEvent('item-saved', ['action' => 'saved', 'item_name' => $this->name]);
        }

        $this->emitTo('inventory-table', 'triggerRefresh');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->inventoryId = null;
        $this->name = null;
        $this->description = null;
        $this->stock = null;
        $this->unit = null;
        $this->photo = null;
    }

    public function triggerEdit($inventory)
    {
        $this->inventoryId = $inventory['id'];
        $this->name = $inventory['name'];
        $this->description = $inventory['description'];
        $this->stock = $inventory['stock'];
        $this->unit = $inventory['unit'];
        $this->photo = $inventory['photo'];

        $this->emit('inventoryFetched', $inventory);
    }
}
