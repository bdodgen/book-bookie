<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        dd('This is admin index of books');
    }

    public function create()
    {

    }

    public function delete()
    {

    }
    // returns data for 10 latest books
    public function latest() 
    {
      $books = Book::orderBy('publication_date', 'desc')->limit(10)->get();
      return $books;
    }
}
