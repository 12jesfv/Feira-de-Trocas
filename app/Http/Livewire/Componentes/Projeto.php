<?php

namespace App\Http\Livewire\Componentes;

use Livewire\Component;

class Projeto extends Component
{
  public $projeto;
  public $titulo, $descricao, $observacoes, $responsavel;
  public $show = 1, $create = 0;

  public function mount()
  {
    if ($this->create == 1) {
      $this->titulo = '';
      $this->descricao = '';
      $this->observacoes = '';
      $this->responsavel = '';
    } else {
      $this->titulo = $this->projeto->titulo;
      $this->descricao = $this->projeto->descricao;
      $this->observacoes = $this->projeto->observacoes;
      $this->responsavel = $this->projeto->responsavel;
    }
  }

  public function render()
  {
      return view('livewire.componentes.projeto.index');
  }

  public function store()
  {
      $this->validate([
          'titulo' => 'required',
      ]);
      $this->projeto = \App\Models\Projeto::updateOrCreate(['id' => $this->create ? '0' : $this->projeto->id], [
          'titulo' => $this->titulo,
          'descricao' => $this->descricao,
          'observacoes' => $this->observacoes,
          'responsavel' => $this->responsavel,
      ]);
      $this->show = 1;
      session()->flash('message', $this->create ? 'Projeto criado.' : 'Projeto atualizado.');
      $this->emit('projetUpdated', $this->create ? 'Projeto criado.' : 'Projeto atualizado.');
  }

  public function show(){
    $this->show = 1;
  }

  public function edit()
  {
    // $this->titulo = $this->projeto->titulo;
    // $this->descricao = $this->projeto->descricao;
    // $this->observacoes = $this->projeto->observacoes;
    // $this->responsavel = $this->projeto->responsavel;
    $this->show = 0;
  }

  public function delete($id)
  {
      App\Models\Projeto::find($id)->delete();
      session()->flash('message', 'Projeto apagado.');
      $this->emit('projetRemoved');

  }

  public function openModalPopover()
  {
      $this->show = 0;
  }

  public function closeModalPopover()
  {
        $this->show = 1;
  }
}
