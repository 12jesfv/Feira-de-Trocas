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

    <div class="form-group">
        <label for="exampleFormControlInput2">ID do user</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="user_id" placeholder="id user"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror

        <select>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{ $user->name}}</option>
        @endforeach
        </select>
       
    </div>


    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
