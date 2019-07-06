<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'slug' => 'required'

        ]);*/

       /* dd($request->all());*/
        Author::create([
            'firstname' =>$request->firstname,
            'lastname' =>$request->lastname,
            'birthday' =>$request->birthday,
            'slug' =>$request->slug
        ]);

        return redirect()->route('authors.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $entity = $author;
        return view('admin.authors.form', compact('entity')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
   /*     $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'slug' => 'required'
            ]);*/

        $author->update($request->all());

        return redirect()->route('authors.index');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');//
    }
}
