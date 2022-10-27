<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * returns data for 10 latest books
     */
    public function latest()
    {
        $books = Book::orderBy('publication_date', 'asc')->with('authors')->limit(20)->get();

        return $books;
    }

    public function latestCrime()
    {
        return Book::getLatestCrimeBooks();
    }
}