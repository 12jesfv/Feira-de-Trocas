<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update_reserva')
    @else
        @include('livewire.create_reserva')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Data de reserva</th>
                <th>Cartao da escola</th>
                <th>Produto</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->data_reserva }}</td>
                <td>{{ $reserva->User->cartao}}</td>
                <td>{{ $reserva->Produto->nome }}</td>                
                <td>
                <button wire:click="edit({{ $reserva->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $reserva->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
