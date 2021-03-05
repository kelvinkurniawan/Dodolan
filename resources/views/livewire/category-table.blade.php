<div>
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div class="float-left">
                <button class="btn btn-success" wire:click="$emit('categoryCreate')">Create New Category</button>
            </div>
            <div class="float-right">
                <input wire:model.debounce.800ms="search" class="form-control" type="text"
                    placeholder="Search Category...">
            </div>
        </div>
    </div>

    <div class="row">
        @if ($categories->count())
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead class="text-primary">
                    <tr>
                        <th style="width: 20%">
                            <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                Name
                                @include('includes.sort-icon', ['field' => 'name'])
                            </a>
                        </th>
                        <th style="width: 10%">
                            <a wire:click.prevent="sortBy('description')" role="button" href="#">
                                Description
                                @include('includes.sort-icon', ['field' => 'description'])
                            </a>
                        </th>
                        <th style="width: 10%">
                            Product Total
                        </th>
                        <th style="width: 15%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ count($category->product) }}</td>
                        <td>
                            <button class="btn btn-sm btn-dark" wire:click="$emitTo('category-form', 'triggerEdit', {{ $category }})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$emit('categoryDelete', {{ $category->id }}, '{{ $category->name }}')">
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
            {{ $categories->links() }}
        </div>
    </div>
</div>
