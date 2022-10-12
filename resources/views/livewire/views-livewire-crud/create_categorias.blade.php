<form>
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

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
