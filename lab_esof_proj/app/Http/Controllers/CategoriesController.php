<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\Products;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string',
        ]);


        $categorie = new Categories();
        $categorie->name = $request->input('name');


        $categorie->save();

        return redirect()->route('admincategories')->with('success', 'Categorie added success');
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categories $categories)
    {

         $request->validate([
            'name' => 'required|string',

        ]);
        $categories->update([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('admincategories')->with('success', 'Categorie edited with sucess');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        $products = Products::where('categories_id', $categories->id)->get();


        foreach ($products as $product) {
            $product->update(['categories_id' => null]);
        }

        $categories->delete();
        return redirect()->route('admincategories')->with('success', 'Categorie deleted with sucess');
    }
}
