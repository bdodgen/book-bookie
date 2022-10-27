@extends('layouts/main', [
  'title' => 'Home',
    'current_menu_item' => 'home'
])

@section('content')

<h1>Book Bookie</h1>

<p>
    We're not really that great, but shop here if you want, I guess.
</p>

<h3>Crime Books:</h3>
@foreach ($crime_books as $book)
    <div class="book">
        <li>
            {{ $book->title }} 
            // {{ $book->authors->pluck('name')->join(', ') }} 
            ({{ $book->publishers->pluck('name')->join(', ') }})
        </li>
    </div>
@endforeach

{{-- latest books JS script --}}
{{-- <div id="latest-books"></div>
@vite('resources/js/latest-books.js') --}}

{{-- partners React application --}}
<div id="partners"></div>
@viteReactRefresh
@vite('resources/js/partners.jsx')

@endsection