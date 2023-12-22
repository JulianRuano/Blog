<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index' ,[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create',[
            'roles' => Rol::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'min:8'],
            'role'    => 'required'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'rol_id'    => $request->role,
            'password'  => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user,
            'roles' => Rol::all(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users,email,'.$id],
            'role'    => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->rol_id = $request->role;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
