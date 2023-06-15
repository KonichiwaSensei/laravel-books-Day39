<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function latest()
    {
        $books = Book::orderBy('publication_date', 'DESC')->with('authors')->limit(10)->get();

        return BookResource::collection($books);
    }
}
