<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use App\Models\Author;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index () 
    {
        $crime_books = Book::getLatestCrimeBooks();

        $crime_books->load([
            'authors',
            'publishers'
        ]);
        
        return view('index/index', [
            'crime_books' => $crime_books
        ]);
    }
}
