<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Book Store' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    {{-- Header / Navbar --}}
    <div class="header">
        <ul type="none" class="nav-menu">
            <div class="nav-left">
                <li><a href="{{ route('index') }}">Homepage</a></li>
                <li><a href="{{ url('/category') }}">Books Category</a> </li>
                <li><a href="{{ url('/sales') }}">On Sales</a></li>
                <li><a href="{{ url('/new') }}">New Books</a></li>
            </div>

            <div class="nav-right">
                @auth
                <li><a href="#">Account</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            </div>
        </ul>
        
        <ul type="none" class="user-menu">
            <div class="search-bar">
                <form action="{{ route('findBook') }}" method="get">
                    <input type="text" name="name" placeholder="Search books..." value="{{ request('name') }}"/>
                </form>
            </div>
            <li><a href="{{ route('carts.indexCart') }}">Cart</a></li>
        </ul>
    </div>

    {{-- Nội dung chính --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Footer --}}
    <div class="footer">
        <hr>
        <ul class="bottom">
            <li>
                <p>About us</p>
                <hr>
                <ul type="none">
                    <li>Main menu</li>
                    <li>About us</li>
                    <li>Our shelf</li>
                </ul>
            </li>

            <li>
                <p>Instructions</p>
                <hr>
                <ul type="none">
                    <li>How to buy</li>
                    <li>Check out</li>
                    <li>Shipping and return policy</li>
                    <li>Terms of service</li>
                </ul>
            </li>

            <li>
                <p>Main menu</p>
                <hr>
                <ul type="none">
                    <li>CÔNG TY TRÁCH NHIỆM HỮU HẠN</li>
                    <li>CHIM VẶN DÂY CÓT</li>
                    <li>Email: Th41299292@fake.email.com</li>
                    <li>Address: Phố 123, số 321 Hà Nội</li>
                    <li>Hoàn Kiếm, Hà Nội</li>
                </ul>
            </li>
            <li>
                <p>Follow us at</p>
                <hr>
                <ul type="none">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>
