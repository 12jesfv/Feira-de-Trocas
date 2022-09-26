<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Crud extends Component
{
    public $produtos, $nome, $descricao, $preco, $produto_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->produtos = Produto::all();
        return view('livewire.crud');
    }

    public function create(){
      $this->resetCreateForm();
      $this->openModalPopover();
    }

    public function openModalPopover(){
      $this->isModalOpen = true;
    }

    public function closeModalPopover(){
      $this->isModalOpen = false;
    }

    private function resetCreateForm(){
      $this->nome = '';
      $this->descricao = '';
      $this->preco = '';
    }

    public function store(){
      $this->validate([
        'nome' => 'required',
        'descricao' => 'required',
        'preco' => 'required'
      ]);

      Produto::updateOrCreate(
        ['id' => $this->produto_id],
        [
          'nome' => $this->nome,
          'descricao' => $this->descricao,
          'preco' => $this->preco
        ]
      );

      session()->flash('message', $this->produto_id ? 'Produto Updated.' : 'Produto Created.');

      $this->closeModalPopover();
      $this->resetCreateForm();

    }

    public function edit($id){
      $produto = Produto::findOrFail($id);
      $this->produto_id = $id;
      $this->nome = $produto->nome;
      $this->descricao = $produto->descricao;
      $this->preco = $produto->preco;

      $this->openModalPopover();

    }

    public function delete($id){
      Produto::find($id)->delete();
      session()->flash('message', 'Produto delete.');
    }

}
