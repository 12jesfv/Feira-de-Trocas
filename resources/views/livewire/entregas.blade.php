<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update_entrega')
    @else
        @include('livewire.create_entrega')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Data de entrega</th>
                <th>Cartao da escola</th>
                <th>Produto</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entregas as $entrega)
            <tr>
                <td>{{ $entrega->id }}</td>
                <td>{{ $entrega->data_entrega }}</td>
                <td>{{ $entrega->User->cartao}}</td>
                <td>{{ $entrega->Produto->nome }}</td>                
                <td>
                <button wire:click="edit({{ $entrega->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $entrega->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
