<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $author = new Author();

        return view('authors.form', compact('author'));
    }

    public function store(AuthorRequest $request)
    {
        $author = new Author();
        $author->name = $request->post('name');
        $author->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $author->name)));
        $author->bio = $request->post('bio');
        $author->save();

        session()->flash('success_message', 'Author created.');

        return redirect()->route('authors.show', $author->id);
    }

    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return view('authors.show', compact('author'));
    }

    public function edit(string $id)
    {
        $author = Author::findOrFail($id);

        return view('authors.form', compact('author'));
    }

    public function update(AuthorRequest $request, string $id)
    {
        $author = Author::findOrFail($id);
        $author->name = $request->post('name');
        $author->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $author->name)));
        $author->bio = $request->post('bio');
        $author->save();

        session()->flash('success_message', 'Author updated.');

        return redirect()->route('authors.show', $author->id);
    }

    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        session()->flash('success_message', 'Author deleted.');

        return redirect()->route('authors.index');
    }
}
