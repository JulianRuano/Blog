<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;



class BlogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['images' => function ($query) {
            $query->select('id','blog_id', 'alt', 'url', 'position');
        }])
        ->with(['contents' => function ($query) {
            $query->select('id','blog_id','text', 'position');
        }])
        ->with(['category' => function ($query) {
            $query->select('id', 'name');
        }])
        ->select('id', 'title','description', 'slug', 'category_id')
        ->get();

        return response()->json($blogs);
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
