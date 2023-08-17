<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produtos', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('endereco_produto');
            $table->unsignedBigInteger('endereco_entrega');
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->decimal('peso');
            $table->decimal('valor_peso');
            $table->decimal('valor_distancia');
            $table->decimal('distancia');
            $table->unsignedTinyInteger('minutos_tempo_entrega');
            $table->decimal('valor_tempo_entrega');
            $table->string('imagem');
            $table->decimal('total');
            $table->foreign('endereco_produto')->references('id')->on('enderecos');
            $table->foreign('endereco_entrega')->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
