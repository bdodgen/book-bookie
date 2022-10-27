<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create() {
        $author = new Author;
        return view('author/create', compact('author'));
    }

    public function index () {
        $authors = Author::orderBy('slug', 'desc')->limit(42)->get();

        return view('author/authors', [
            'authors' => $authors
        ]);
    }

    public function store(Request $request) {

        $name = str_replace(' ', '-', $request->name) . '-author';
        $author = new Author;
        $author->name = $request->input('name');
        $author->slug = strToLower($name);
        // $author->bio = $request->bio;

        $author->save();

        return redirect('/admin/authors/create');
    }

// In /routes/admin.php, declare a route that would point to your create method of the Admin\AuthorController when the user comes to the URL /admin/authors/create with the GET request method.
}
