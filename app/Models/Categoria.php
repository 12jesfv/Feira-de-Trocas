<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    // Campos para o modelo Categoria

    /*
    @nome string
    */
    protected $fillable = [
        'nome',
        'estado'
    ];

	// Relacao categoria produtos 1:N
    
    public function produtos(){
        return this->hasMany(Produto::class);
      }

    use HasFactory;
}
