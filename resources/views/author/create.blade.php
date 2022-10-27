@extends('layouts/main', [
  'title' => 'Admin | Create Author'
])

@section('content')

<form method="post" action="/admin/authors/create" accept-charset="UTF-8">
    {{ csrf_field() }}

    <label for="name">New Author Name:</label><br>
    <input type="text" name="name"><br>

    {{-- <label for="bio">Bio:</label><br>
    <input type="text" name="bio"><br> --}}

    <button type="submit">Let's make an author!</button>
</form>

@endsection