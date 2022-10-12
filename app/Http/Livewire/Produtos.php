<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Categoria;

class Produtos extends Component
{
    public $produtos, $nome, $descricao, $preco, $produto_id, $categoria_id;
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
        $this->categoria_id = '';
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
            'categoria_id' => 'required'
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
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->preco = $produto->preco;
        $this->categoria_id = $produto->categoria_id;

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
            'preco' => 'required',
            'categoria_id' => 'required',
        ]);

        $produto = Produto::find($this->produto_id);
        $produto->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria_id,
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
