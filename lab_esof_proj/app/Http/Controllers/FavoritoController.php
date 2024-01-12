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

    $id_user = Auth::id();


    $favoritos = Favorito::where('user_id', $id_user)->get();


    return view('favorites.index', compact('favoritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id_produto)
    {
            $id_user = Auth::id();
                $favorito = new Favorito();
                $favorito->user_id = $id_user;
                $favorito->product_id = $id_produto;
                $favorito->save();
                return back()->with('success', 'Favorito added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorito $favorito)
    {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_produto){
    $favorito = Favorito::where('product_id', $id_produto)->first();

    if ($favorito) {

        $favoritoId = $favorito->id;

        Favorito::destroy($favoritoId);

        return back()->with('success', 'Favorito removed successfully');
    }
    }
}