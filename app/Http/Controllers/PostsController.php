<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required',
            'title' => 'required',
            'category_id' => 'required|integer'
        ]);
        File::makeDirectory('storage/images/', 0777, true, true);

        $item = $request->file('image');
//        dd($request);
        $filename = time() . '.' . $item->getClientOriginalExtension();
        $location = 'storage/images/' . $filename;
        $request->image = $location . $filename;
        Image::make($item)->save($location);
        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $entity = $post;
        $categories = Category::all();

        return view('admin.posts.form', compact('categories', 'entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'slug' => 'required|unique:posts',
            'title' => 'required',
            'category_id' => 'required|integer'
        ]);
        File::makeDirectory('storage/images/', 0777, true, true);

        $item = $request->file('image');

        $filename = time() . '.' . $item->getClientOriginalExtension();
        $location = 'storage/images/' . $filename;
        Image::make($item)->save($location);
        $request = $request->all();
        $request['image'] = 'images/' . $filename;
        $post->update($request);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}
