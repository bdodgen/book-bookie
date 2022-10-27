@extends('layouts/main', [
  'title' => 'Home'
])

@section('content')

@include('common.errors')

<form action="{{ route('login') }}" method="post">
    @csrf

    Email: <br>
    <input type="email" name="email" value="{{ old('email') }}"><br>
  
    Password: <br>
    <input type="password" name="password" value=""> <br>
 
    <button>Login</button>
 
</form>

@endsection