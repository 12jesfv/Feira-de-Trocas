<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'data_entrega',
        'user_id',
        'produto_id'
    ];
    use HasFactory;

    

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }
}
