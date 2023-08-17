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
        Schema::create('InfoPagamentos', function (Blueprint $table){
            $table->id();
            $table->string('numero_cartao',19);
            $table->string('nome_cartao', 50);
            $table->string('nome_cliente',150);
            $table->string('CVV',3);
            $table->date('data_vencimento');
            $table->string('CPF',12);
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
