<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Nome:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Nome" wire:model="nome">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Descricao:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="descricao" placeholder="Enter descricao"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Preco:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="preco" placeholder="Enter Preco"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">ID da categoria</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="categoria_id" placeholder="Enter Categoria ID"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
