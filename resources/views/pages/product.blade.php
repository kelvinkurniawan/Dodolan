@extends('layouts.app', [
'class' => '',
'elementActive' => 'tables'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Product List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th style="width: 15%">
                                    Name
                                </th>
                                <th style="width: 15%">
                                    Price
                                </th>
                                <th style="width: 5%">
                                    Stock
                                </th>
                                <th style="width: 20%">
                                    Category
                                </th>
                                <th style="width: 20%">
                                    Ingredients
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            @currency($product->price)
                                        </td>
                                        <td>
                                            {{ $product->stock }}
                                        </td>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
