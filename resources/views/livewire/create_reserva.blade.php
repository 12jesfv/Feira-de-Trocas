<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Data de reserva</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Data Reserva" wire:model="data_reserva">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">ID da produto</label>
        

        <select wire:model="produto_id">
        @foreach($produtos as $produto)
            <option value="{{$produto->id}}">{{ $produto->nome}}</option>
        @endforeach
        </select>
       
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Nome do estudante</label>

        <select wire:model="user_id">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{ $user->name}}</option>
        @endforeach
        </select>
       
    </div>


    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
