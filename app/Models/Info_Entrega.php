<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Entrega extends Model
{
    use HasFactory;

    protected $fillable = ['valor_distancia', 'valor_tempo_dislocamento'];

    protected $table = 'Info_Entrega';

    public $timestamps = false; // TODO adicionar timestamps?
}
