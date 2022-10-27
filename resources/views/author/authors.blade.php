@extends('layouts/main', [
  'title' => 'Admin | Authors'
])

@section('content')

<h1>Authors</h1>
<h3>Admin View</h3>

<ul>
    @foreach ($authors as $author)
        <li>
            {{ $author->slug }}
        </li>
    @endforeach
</ul>

@endsection