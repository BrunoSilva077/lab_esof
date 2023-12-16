<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoritos = Favorito::all();
        return view('fav.favprofile', compact('favoritos'));
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
    public function store(Request $request)
    {
        //
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
