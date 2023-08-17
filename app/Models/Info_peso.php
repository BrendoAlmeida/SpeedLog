<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_peso extends Model
{
    use HasFactory;

    protected $fillable = ['min_peso', 'max_peso', 'preco'];

    public $timestamps = false; // TODO adicionar timestamps?
}
