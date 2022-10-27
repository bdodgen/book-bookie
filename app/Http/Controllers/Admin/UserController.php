<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin/users');
    }
}
