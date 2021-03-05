<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Product Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Product Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 40%">Product Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    @foreach ($product->category as $item)
                                        {{ $item->name }},
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Product Ingredients</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>No</th>
                                <th>Ingredient Name</th>
                                <th>Usage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->inventory as $ingredient)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ingredient->name }}</td>
                                <td>{{ getInventoryUsage($product->id, $ingredient->id). " " .$ingredient->unit }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
