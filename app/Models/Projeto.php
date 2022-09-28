<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'responsavel',
        'descricao',
        'observacoes',
    ];

    public function getDataAttribute() {
      return Carbon::parse($this->created_at)->format("Y-m-d");
    }
}
