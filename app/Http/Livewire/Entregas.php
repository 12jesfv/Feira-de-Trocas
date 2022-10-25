<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entrega;
use App\Models\Produto;
use App\Models\User;
class Entregas extends Component
{

    public $entregas, $data_entrega, $entrega_id, $produtos, $produto_id, $users, $user_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->entregas = Entrega::all();
        $this->produtos = Produto::all();
        $this->users = User::all();
        return view('livewire.entregas');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->data_entrega = '';
        $this->user_id = '';
        $this->produto_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'data_entrega' => 'required',
            'user_id' => 'required',
            'produto_id' => 'required'
        ]);
        
        // $this->verifyAndUpload($request, 'file', 'images');

        Entrega::create($validatedDate);

        session()->flash('message', 'Entrega Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $entrega = Entrega::findOrFail($id);
        $this->entrega_id = $id;
        $this->data_entrega = $entrega->data_entrega;
        $this->user_id = $entrega->user_id;
        $this->produto_id = $entrega->produto_id;

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
            'data_entrega' => 'required',
            'user_id'=> 'required',
            'produto_id' => 'required',
        ]);

        $entrega = Entrega::find($this->entrega_id);
        $entrega->update([
            'data_nascimento' => $this->data_nascimento,
            'user_id' => $this->user_id,
            'produto_id' => $this->produto_id,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Entrega Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Entrega::find($id)->delete();
        session()->flash('message', 'Entrega Deleted Successfully.');
    }
}
