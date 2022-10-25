<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Data Nascimento:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter data nascimento" wire:model="data_entrega">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">ID da produto</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="produto_id" placeholder="Enter Produto ID"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
