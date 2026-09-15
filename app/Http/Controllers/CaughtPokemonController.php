<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaughtPokemon;
use Illuminate\Support\Facades\Http;

class CaughtPokemonController extends Controller
{
    public function index() 
    {
        $pokemon = CaughtPokemon::all();

        return response()->json([
            'success' => true,
            'data' => $pokemon
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pokeapi_id' => 'required|integer',
            'name'       => 'required|string',
            'image_url'  => 'nullable|url',
            'is_shiny'   => 'boolean'
        ]);

        $pokemon = CaughtPokemon::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Pokemon berhasil ditambahkan ke koleksi!',
            'data' => $pokemon
        ], 201);
    }

    public function searchPokedex($name)
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . strtolower($name));

        if ($response->successful()) {
            $data = $response->json();

            return response()->json([
                'success' => true,
                'data' => [
                    'pokeapi_id' => $data['id'],
                    'name'       => ucfirst($data['name']),
                    'image_url'  => $data['sprites']['other']['official-artwork']['front_default'] ?? null,
                ]
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Pokemon tidak ditemukan.'
        ], 404);
    }
}
