<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('produtos', function (Blueprint $table) {
           $table->id();
           $table->string('nome', 100);
           $table->string('descricao');
           $table->decimal('preco');
           $table->string('file', 220);
           $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
           $table->string('categoria_nome', 100)->default('');;
           $table->timestamps();
          // $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('produtos');
     }

}
