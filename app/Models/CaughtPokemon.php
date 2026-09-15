<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaughtPokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'pokeapi_id',
        'name',
        'image_url',
        'is_shiny'
    ];
}
