<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class BookController extends Controller
{
    /**
     * shows detailed information about a book
     */
    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('book/show', compact(
            'book'
        ));
    }

    /**
     * handles submission of the review form
     */
    public function saveReview(Request $request, $book_id)
    {
        $this->validate($request, [
            'text' => [
                'required',
                'max:255',

                // custom validation function
                function($attribute, $value, $fail) use ($book_id) {
                    // try to select an existing review of this book by this user
                    $existing_review = Review::where('book_id', $book_id)->where('user_id', Auth::id())->first();

                    if ($existing_review) {
                        // if we found that review, we fail the validation
                        $fail('You have already reviewed this book. Try another!');
                    }
                }

            ]
        ], [
            'text.max' => 'Nooooo! This is too long! 255 characters max!'
        ]);

        // make a new object
        $review = new Review;
        // fill it with data (from the request)
        $review->book_id = $book_id;
        $review->user_id = Auth::id();
        $review->text = $request->post('text'); // $_POST['text']
        // save it -> does an INSERT query
        $review->save();

        session()->flash('success_message', 'Review saved. Thanks for contributing.');

        return redirect()->route('book.show', $book_id);
    }
}