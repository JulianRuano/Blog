<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index' ,[
            'roles' => Rol::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:50',
            'description' => 'required',
        ]);

        $rol = new Rol();
        $rol->name = $request->name;
        $rol->description = $request->description;

        $rol->save();

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado correctamente.');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Rol::find($id);
        return view('roles.edit', [
            'role' => $rol
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles,name,'.$id,
            'description' => 'required',
        ]);

        $rol = Rol::find($id);
        $rol->name = $request->name;
        $rol->description = $request->description;
        $rol->save();

        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        $rol->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado correctamente.'); 
    }
}
