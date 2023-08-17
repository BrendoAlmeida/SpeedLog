<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'frenteRG', 'atrasRG', 'segurandoRG', 'placaMoto'];

    public function Cliente()
    {
        return $this->hasOne(User::class, 'id', 'cliente_id');
    }
}
