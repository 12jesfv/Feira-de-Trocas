<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Categorias extends Component
{
    public $categorias, $nome, $categoria_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->categorias = Categoria::all();
        return view('livewire.categorias');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->nome = '';
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
        ]);

        Categoria::create($validatedDate);

        session()->flash('message', 'Categoria Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $id;
        $this->nome = $categoria->nome;

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
            
        ]);

        $categoria = Categoria::find($this->categoria_id);
        $categoria->update([
            'nome' => $this->nome,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Categoria Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Categoria::find($id)->delete();
        session()->flash('message', 'Categoria Deleted Successfully.');
    }
}
