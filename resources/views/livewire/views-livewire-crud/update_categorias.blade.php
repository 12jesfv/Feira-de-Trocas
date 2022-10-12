<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Nome:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Nome" wire:model="nome">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Estado:</label>
        <select wire:model="estado">
            <option value="0">0</option>
            <option value="1">1</option>
        </select>
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
