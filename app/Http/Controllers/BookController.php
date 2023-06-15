<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->limit(10)->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $book = new Book();

        return view('books.form', compact('book'));
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->title = $request->post('title');
        $book->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $book->title)));
        $book->price = $request->post('price');
        $book->publication_date = $request->post('publication_date');
        $book->description = $request->post('description');
        $book->save();

        session()->flash('success_message', 'Book created.');

        return redirect()->route('books.show', $book->id);
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        // $book->reviews;
        // dd($book);
        // $reviews = Review::with('books')->get();

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books.form', compact('book'));
    }

    public function update(BookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->post('title');
        $book->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $book->title)));
        $book->price = $request->post('price');
        $book->publication_date = $request->post('publication_date');
        $book->description = $request->post('description');
        $book->save();

        session()->flash('success_message', 'Book updated.');

        return redirect()->route('books.show', $book->id);
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        session()->flash('success_message', 'Book deleted.');

        return redirect()->route('books.index');
    }
}
