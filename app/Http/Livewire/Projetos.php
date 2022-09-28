<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Projeto;
use Livewire\WithPagination;

class Projetos extends Component
{
    use WithPagination;

    public $isModalOpen = 0;
    public $search = '', $perPage = 15;

    protected $listeners = ['projetUpdated' => 'aviso'];

    public function aviso($message)
    {
      $this->closeModalPopover();
      session()->flash('message', $message);
      $this->render();
    }

    public function render()
    {
        $projetos = Projeto::where(function ($query) {
                            $query->where('titulo', 'LIKE',"%" . $this->search . "%")
                                ->orWhere('descricao', 'LIKE',"%" . $this->search . "%")
                                ->orWhere('observacoes', 'LIKE',"%" . $this->search . "%");
                            })
                            ->paginate($this->perPage);
        return view('livewire.projetos.index', compact('projetos'));
    }

    public function create()
    {
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

}
