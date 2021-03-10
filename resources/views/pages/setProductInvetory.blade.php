@extends('layouts.app', [
'class' => '',
'elementActive' => 'tables'
])

@section('content')
<div class="content">
    <div class="row">
        <livewire:product-inventory :productId="$productId" />
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="setInventory-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Inventory Usage</h5>
                <button type="button" class="close closeInventoryModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <livewire:product-inventory-form>
            </div>
        </div>
    </div>
</div>
@endsection
