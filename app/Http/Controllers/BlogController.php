<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Content;
use App\Models\Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogs.index', [
            'categories' => Category::all(),
            'blogs' => Blog::all(),       
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create', [
            'categories' => Category::all(),
            'blogs' => Blog::all(),
            'contents' => Content::all(),
            'images' => Image::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required|max:200',
            'slug' => 'required',
            'alt' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 

        $blog = new Blog();
        $blog -> user_id = 1;
        $blog -> title = $request -> title;
        $blog -> category_id = $request -> category_id;
        $blog -> description = $request -> description;
        $blog -> slug = $request -> slug;

        $blog -> save();

        // guardar imagen en storage/app/public/images
        $img = $request->file('image');
        $image_name = time().'.'.$img->extension();

        $img->storeAs('public/images', $image_name);

        // guardar imagen en la base de datos
        $image = new Image();
        $image -> blog_id = $blog -> id;
        $image -> url = $image_name;
        $image -> alt = $request -> alt;
        $image -> position = 1;

        $image -> save();

        $content = new Content();
        $content -> blog_id = $blog -> id;
        $content -> title = $request -> title;
        $content -> position = 1;
        $content -> text = $request -> content;

        $content -> save();

        return redirect() -> route('blogs.index')
            -> with('success', 'Blog creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
