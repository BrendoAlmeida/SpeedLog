<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'motorista_id', 'hora_entrega', 'imagem_entrega', 'status'];

    protected $table = 'Viagens';

    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }

    public function motorista()
    {
        return $this->hasOne(Motorista::class, 'id', 'motorista_id');
    }
}
