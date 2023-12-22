<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Obtém o ID do usuário autenticado
    $id_user = Auth::id();

    // Busca os favoritos associados ao usuário autenticado
    $favoritos = Favorito::where('user_id', $id_user)->get();

    // Passa os favoritos para a view
    return view('favorites.index', compact('favoritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id_produto)
    {
        $id_user = Auth::id();
        // $jaFavorito = Favorito::where('user_id', $user_id)
        // ->where('product_id', $id_produto)
        // ->exists();

        // if ($jaFavorito) {
        //     // Produto já está nos favoritos
        //     return redirect()->back()->with('error', 'Este produto já está nos seus favoritos.');
        // }

            $favorito = new Favorito();
            $favorito->user_id = $id_user;
            $favorito->product_id = $id_produto;
            $favorito->save();
            return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}