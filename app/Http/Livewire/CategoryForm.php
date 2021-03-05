<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CategoryForm extends Component
{

    public $categoryId;
    public $name;
    public $description;

    protected $listeners = ['triggerEdit'];

    public function render()
    {
        return view('livewire.category-form');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|min:5',
            'description' => ''
        ]);

        if($this->categoryId){
            Category::find($this->categoryId)
                ->update([
                    'name' => $this->name,
                    'description' => $this->description
                ]);

            $this->dispatchBrowserEvent('item-saved', ['action' => 'updated', 'item_name' => $this->name]);

        }else{
            Category::create(array_merge($validated, [
                'created_by' => Auth::id()
            ]));

            $this->dispatchBrowserEvent('item-saved', ['action' => 'created', 'item_name' => $this->name]);
        }

        $this->emitTo('category-table', 'triggerRefresh');
        $this->resetForm();
    }

    public function resetForm(){
        $this->categoryId = null;
        $this->name = null;
        $this->description = null;
    }

    public function triggerEdit($category)
    {

        $this->categoryId = $category['id'];
        $this->name = $category['name'];
        $this->description = $category['description'];

        $this->emit('categoryFetched', $category);
    }
}
