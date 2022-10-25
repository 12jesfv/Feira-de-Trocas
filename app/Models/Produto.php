<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

      // Campos para o modelo Produto

      /*
      @nome string
      @descricao string
      @preco double
      */
      
      protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'file',
        'categoria_id'
    ];

    // Relacao produtos categoria N:1

    public function categoria(){
      return $this->belongsTo(Categoria::class); // categoria_id
    }

    use HasFactory;
}
