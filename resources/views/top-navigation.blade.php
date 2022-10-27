<nav class="theme--{{ $theme }}">
    <a href="/">Home</a>
    @if ($current_menu_item == 'about-us')
        <span>About Us</span>
    @else
        <a href="/about-us">About Us</a>
    @endif
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
    @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth
    @auth
        Logged in as: {{ auth()->user()->name }}, id {{ auth()->id() }}

    @endauth

    @can('admin')
        <a href="{{ route('admin.books.index') }}">Books admin</a>
    @endif
</nav>