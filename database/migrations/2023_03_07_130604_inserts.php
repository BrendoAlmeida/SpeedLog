<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::insert("INSERT INTO `info_entrega` (`valor_distancia`, `valor_tempo_dislocamento`) VALUES ('0.50', '0.30');");
        DB::insert("INSERT INTO `clientes`(`id`, `name`, `email`, `password`, `cpf`, `imagem`) VALUES ('1','adminTeste','d@d.com','$2y$10\$v9kf8EZaEHY0UQd.2TTeR.XnCPdzaA/lgRE9sfxsrchKtEvtZOR1u','000.000.000-00','User.png')");
        DB::insert("INSERT INTO `administradores`(`cliente_id`, `chave_admin`) VALUES ('1','$2y$10\$v9kf8EZaEHY0UQd.2TTeR.XnCPdzaA/lgRE9sfxsrchKtEvtZOR1u')");
        DB::insert("INSERT INTO `info_pesos` (`min_peso`, `max_peso`, `preco`) VALUES ('0.01', '1', '3.00'), ('1.00', '3.00', '5.00'), ('3.00', '8.00', '9.00'), ('8.00', '12.00', '12.00')");

        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Motorista']);
        Role::create(['name' => 'AdminLogado']);
    }
};
