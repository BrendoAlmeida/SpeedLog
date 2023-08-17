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
        Schema::create('Viagens', function (Blueprint $table){
            $table->id();
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->foreignId('motorista_id')->nullable()->constrained()->onDelete('cascade');
            $table->dateTime('hora_entrega')->nullable();
            $table->string('imagem_entrega')->nullable();
            $table->string('status')->default('Esperando coleta');
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
