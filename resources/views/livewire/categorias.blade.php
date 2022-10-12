<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update_categorias')
    @else
        @include('livewire.create_categorias')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nome</th>
                <th>Estado</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->estado }}</td>
                <td>
                <button wire:click="edit({{ $categoria->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $categoria->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
