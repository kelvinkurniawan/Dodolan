<div>
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div class="float-left">
                <button class="btn btn-success" wire:click="$emit('triggerCreate')">Create New Product</button>
            </div>
            <div class="float-right">
                <input wire:model.debounce.800ms="search" class="form-control" type="text" placeholder="Search Users...">
            </div>
        </div>
    </div>

    <div class="row">
        @if ($products->count())
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead class="text-primary">
                    <tr>
                        <th style="width: 15%">
                            <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                Name
                                @include('includes.sort-icon', ['field' => 'name'])
                            </a>
                        </th>
                        <th style="width: 10%">
                            <a wire:click.prevent="sortBy('price')" role="button" href="#">
                                Price
                                @include('includes.sort-icon', ['field' => 'price'])
                            </a>
                        </th>
                        <th style="width: 5%">
                            <a wire:click.prevent="sortBy('stock')" role="button" href="#">
                                Stock
                                @include('includes.sort-icon', ['field' => 'stock'])
                            </a>
                        </th>
                        <th style="width: 15%">
                            Category
                            @include('includes.sort-icon', ['field' => 'category'])
                        </th>
                        <th style="width: 15%">
                            Ingredients
                            @include('includes.sort-icon', ['field' => 'inventory'])
                        </th>
                        <th style="width: 15%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>@currency($product->price)</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @foreach($product->category as $cat)
                                {{ $cat->name }},
                            @endforeach
                        </td>
                        <td>
                            @foreach($product->inventory as $inv)
                                {{ $inv->name }},
                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" wire:click="$emit('deleteTriggered', {{ $product->id }}, '{{ $product->name }}')">
                                Delete
                            </button>
                            <button class="btn btn-sm btn-dark" wire:click="$emitTo('product-form', 'triggerEdit', {{ $product }})">
                                Edit
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
            {{ $products->links() }}
        </div>
    </div>
</div>
