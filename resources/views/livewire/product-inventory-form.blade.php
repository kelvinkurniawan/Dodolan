<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Set ingredient usage for this product :</label>
            <input type="hidden" class="form-control" id="product_id" name="product_id" wire:model.lazy="product_id">
            <input type="hidden" class="form-control" id="inventory_id" name="inventory_id" wire:model.lazy="inventory_id">
            <input type="number" class="form-control" id="usage" name="usage" wire:model.lazy="usage">
            @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
            @error('usage') <span class="text-danger">{{ $message }}</span> @enderror
            @error('inventory_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
