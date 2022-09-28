<x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if (session()->has('message'))
      <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
          role="alert">
          <div class="flex">
              <div>
                  <p class="text-sm">{{ session('message') }}</p>
              </div>
          </div>
      </div>
      @endif
      <div class="flex flex-col sm:flex-row items-center space-x-2">
        <div class="w-full sm:flex-grow">
          <input class="form-input w-full" type="text" wire:model="search">
        </div>
        <div class="w-full sm:w-1/3 lg:w-1/6">
          <button wire:click="create()"
              class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
              Criar Projeto
          </button>
        </div>
      </div>

      @if($isModalOpen)
        <livewire:componentes.projeto create="1" key="{{ now() }}" > </livewire:componentes.projeto>
      @endif

      <div class="grid
                  grid-cols-1 sm:grid-cols-2 lg:grid-cols-3
                  sm:gap-4">
        @foreach($projetos as $projeto)
          <livewire:componentes.projeto :projeto="$projeto" key="{{ $projeto->id }}" > </livewire:componentes.projeto>
        @endforeach
      </div>
      <div class="py-4">
        {{ $projetos->links() }}
      </div>

    </div>
</div>
