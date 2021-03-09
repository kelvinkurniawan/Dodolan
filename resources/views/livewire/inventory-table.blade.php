<div>
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div class="float-left">
                <button class="btn btn-success" wire:click="$emit('inventoryCreate')">Create New Inventory</button>
            </div>
            <div class="float-right">
                <input wire:model.debounce.800ms="search" class="form-control" type="text"
                    placeholder="Search Inventory...">
            </div>
        </div>
    </div>

    <div class="row">
        @if ($inventories->count())
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead class="text-primary">
                    <tr>
                        <th style="width: 2%">
                            No.
                        </th>
                        <th style="width: 20%">
                            <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                Name
                                @include('includes.sort-icon', ['field' => 'name'])
                            </a>
                        </th>
                        <th style="width: 10%">
                            <a wire:click.prevent="sortBy('stock')" role="button" href="#">
                                Stock
                                @include('includes.sort-icon', ['field' => 'stock'])
                            </a>
                        </th>
                        <th style="width: 10%">
                            Description
                        </th>
                        <th style="width: 15%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $loop->iteration + $inventories->firstItem() - 1 }}</td>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->stock. ' ' .$inventory->unit }}</td>
                        <td>{{ $inventory->description }}</td>
                        <td>
                            <button class="btn btn-sm btn-dark"
                                wire:click="$emitTo('inventory-form', 'triggerEdit', {{ $inventory }})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$emit('inventoryDelete', {{ $inventory->id }}, '{{ $inventory->name }}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="col-md-12">
            <div class="alert alert-danger">
                Your query returned zero results.
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col">
            {{ $inventories->links() }}
        </div>
    </div>
</div>
