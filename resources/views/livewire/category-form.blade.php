<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" wire:model.lazy="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" wire:model.lazy="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
