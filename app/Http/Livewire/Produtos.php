<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use App\Traits\ImageTrait;
class Produtos extends Component
{
    use WithFileUploads;
    use ImageTrait;
    public $produtos,$file, $nome, $descricao, $preco, $produto_id, $categorias, $categoria_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->produtos = Produto::all();
        $this->categorias = Categoria::all();
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
            'file' => 'required',
            'categoria_id' => 'required'
        ]);
        
        $validatedData['file'] = $this->file->store('files', 'public');
        // $this->verifyAndUpload($request, 'file', 'images');

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
