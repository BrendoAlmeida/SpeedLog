<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'chave_admin'];

    protected $table = 'Administradores';

    public $timestamps = false;

    public function Cliente()
    {
        return $this->hasOne(User::class, 'id', 'cliente_id');
    }
}
