<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $request->validate([
            
        // ]);
        // $user->update($request->all());
        $request->validate([
            'email' => 'email',
            'birthday' => 'date',
            // Adicione outras regras de validação conforme necessário
        ]);
    
        $user->update([
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('radio') === 'true', // Assume que o valor do rádio é uma string 'true' ou 'false'
            'password' => bcrypt($request->input('new_password')),
            // Adicione outros campos conforme necessário
        ]);
        return back()->with('success', 'User updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
