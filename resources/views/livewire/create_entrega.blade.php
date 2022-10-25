<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Data de entrega</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Data Entrega" wire:model="data_entrega">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">ID da produto</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="produto_id" placeholder="Enter Categoria ID"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror

        <select>
        @foreach($produtos as $produto)
            <option value="{{$produto->id}}">{{ $produto->nome}}</option>
        @endforeach
        </select>
       
    </div>


    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
