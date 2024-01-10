<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Favorito;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return back();
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
    public function store(Request $request)
    {
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return back();
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
        $request->validate([
            'email' => 'email',
            'birthday' => 'date',
        ]);
    
        $user->update([
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('radio') === 'true',
            'password' => bcrypt($request->input('new_password')),
        ]);
        return back()->with('success', 'User updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {


            if (User::find($user->id)) {
                Favorito::where('user_id', $user->id)->update(['user_id' => null]);
    
                $user->delete();
    
                return back()->with('success', 'User removed successfully');
            } else {
                return back()->with('error', 'User does not exist');
            }

    }
    public function restore(User $user)
    {
        $user->restore();
        return back()->with('success', 'User restored successfully');
    }
}
