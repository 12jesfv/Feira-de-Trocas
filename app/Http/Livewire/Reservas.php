<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\Produto;
use App\Models\User;
class Reservas extends Component
{

    public $reservas, $data_reserva, $reserva_id, $produtos, $produto_id, $users, $user_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->reservas = Reserva::all();
        $this->produtos = Produto::all();
        $this->users = User::all();
        return view('livewire.reservas');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->data_reserva = '';
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
            'data_reserva' => 'required',
            'user_id' => 'required',
            'produto_id' => 'required'
        ]);
        
        // $this->verifyAndUpload($request, 'file', 'images');

        Reserva::create($validatedDate);

        session()->flash('message', 'Reserva Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $this->reserva_id = $id;
        $this->data_reserva = $reserva->data_reserva;
        $this->user_id = $reserva->user_id;
        $this->produto_id = $reserva->produto_id;

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
            'data_reserva' => 'required',
            'user_id'=> 'required',
            'produto_id' => 'required',
        ]);

        $reserva = Reserva::find($this->reserva_id);
        $reserva->update([
            'data_nascimento' => $this->data_nascimento,
            'user_id' => $this->user_id,
            'produto_id' => $this->produto_id,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Reserva Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Reserva::find($id)->delete();
        session()->flash('message', 'Reserva Deleted Successfully.');
    }
}
