<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|unique:categories|max:50',
            'description' => 'required',
        ]);

        $category = new Category();
        $category -> name = $request -> name;
        $category -> description = $request -> description;

        $category -> save();

        return redirect() -> route('categories.index')
            -> with('success', 'Categoría creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'category' => $category
        ]);      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|max:50',
            'description' => 'required',
        ]);

        $category = Category::find($id);
        $category -> name = $request -> name;
        $category -> description = $request -> description;

        $category -> save();

        return redirect() -> route('categories.index')
            -> with('success', 'Categoría actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category -> delete();

        return redirect() -> route('categories.index')
            -> with('success', 'Categoría eliminada correctamente.');
    }
}
