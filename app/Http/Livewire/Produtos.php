<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;

class Produtos extends Component
{
    public $produtos, $nome, $descricao, $preco, $produto_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->produtos = Produto::all();
        return view('livewire.produtos');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->nome = '';
        $this->descricao = '';
        $this->preco = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
        ]);

        Produto::create($validatedDate);

        session()->flash('message', 'Produto Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $this->produto_id = $id;
        $this->nome = $Produto->nome;
        $this->descricao = $Produto->descricao;
        $this->preco = $Produto->preco;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required'
        ]);

        $produto = Produto::find($this->produto_id);
        $produto->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Produto Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Produto::find($id)->delete();
        session()->flash('message', 'Produto Deleted Successfully.');
    }
}
