<!-- <div> -->
  <div class="max-w-md py-2 px-8 bg-blue-50 shadow-lg rounded-lg my-15">
    <div>
      <h2 class="text-gray-800 text-3xl font-semibold">{{ $projeto->titulo }}</h2>
      <p class="mt-2 text-gray-600">
        {{ $projeto->descricao }}
      </p>
      <p class="text-xs text-gray-400">
        Criado em: {{ $projeto->data }}
      </p>
    </div>
    <div class="flex justify-end mt-4">
      <a href="#" class="text-xs font-medium text-indigo-500">{{ $projeto->responsavel }}</a>
    </div>
    <button wire:click="edit()"
        class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
        Editar
    </button>
  </div>
<!-- </div> -->
