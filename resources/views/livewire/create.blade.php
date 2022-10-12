<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nome:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Nome" wire:model="nome">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Descricao:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="descricao" placeholder="Enter Descricao"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Preco</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="preco" placeholder="Enter Preco"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlInput2">ID da categoria</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="categoria_id" placeholder="Enter Categoria ID"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
