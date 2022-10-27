@extends('layouts/main', [
    'title' => 'Book detail',
    'current_menu_item' => null
])
@section('content')
<h1>{{ $book->title }}</h1>
<div class="author">
    by {{ $book->authors->pluck('name')->join(', ') }}
</div>
<img src="{{ $book->image }}" alt="">
@auth
    @include('common.errors')
    @if (session()->has('success_message'))
        <div class="success-message">{{ session()->get('success_message') }}</div>
    @endif
    <form action="{{ route('book.save-review', $book->id) }}" method="post">
        @csrf
        <textarea name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea>
        <button>Submit review</button>
    </form>
@endauth
<h2>Reviews</h2>
@foreach ($book->reviews as $review)
    <div class="review">
        <p>
            {{ $review->text }}
        </p>
        written by {{ $review->user->name }}

        @can('admin')
            <form action="/admin/reviews/{{ $review->id }}/delete" method="post">
                @csrf
                <button>Delete review</button>
            </form>
        @endcan
    </div>
@endforeach

<br>
<br>
<br>
@endsection