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

    
    public function produtos(){
        return this->hasMany(Produto::class); // categoria_id
      }

    use HasFactory;
}
