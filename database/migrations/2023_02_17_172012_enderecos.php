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
        Schema::create('Enderecos', function (Blueprint $table){
            $table->id();
            $table->string('CEP',9);
            $table->string('rua', 50);
            $table->string('numero_casa', 20);
            $table->string('bairro', 50);
            $table->string('complemento', 150)->nullable();
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
