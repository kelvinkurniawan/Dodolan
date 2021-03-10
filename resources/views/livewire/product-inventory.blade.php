<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Used Ingredients</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group connectedSortable" id="usedInventory" style="min-height: 100px">
                        @foreach ($product->inventory as $currentIngredient)
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center"
                                data-used="true"
                                data-id={{ getInventoryId($product->id, $currentIngredient->id) }}
                                data-product={{ $product->id }}
                                data-inventory={{ $currentIngredient->id }}
                                data-ingredient={{ $currentIngredient->name }}>
                                {{ $currentIngredient->name }}
                                <span class="badge badge-primary badge-pill">{{ getInventoryUsage($product->id, $currentIngredient->id). ' ' .$currentIngredient->unit }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Unused Ingredients</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group connectedSortable" id="unUsedInventory">
                        @foreach ($unUsedIngredients as $unUsedIngredient)
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center"
                                data-used="false"
                                data-product="{{ $product->id }}"
                                data-inventory={{ $unUsedIngredient->id }}
                                data-ingredient={{ $unUsedIngredient->name }}>
                                {{ $unUsedIngredient->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
