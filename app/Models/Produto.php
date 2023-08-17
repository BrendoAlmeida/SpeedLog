<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['endereco_produto', 'endereco_entrega', 'cliente_id', 'peso', 'valor_peso', 'distancia', 'valor_distancia','minutos_tempo_entrega', 'valor_tempo_entrega', 'imagem', 'total', 'tempo_pevisto'];

    public function endereco_Produto()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_produto');
    }
    public function endereco_Entrega()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_entrega');
    }

    public function cliente()
    {
        return $this->hasOne(User::class);
    }

    public function viagem()
    {
        return $this->hasOne(Viagem::class, 'produto_id');
    }
}
