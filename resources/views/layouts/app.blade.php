<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Blog')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: #222;
            color: #fff;
            padding: 1rem 0;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            justify-content: flex-start;
            margin: 0;
            padding: 0 2rem;
        }
        nav a {
            color: #00bcd4;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        nav a:hover {
            color: #0097a7;
        }
        main {
            min-height: 80vh;
            padding: 2rem 0;
        }
        .container {
            max-width: 400px;
            margin: 3rem auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            padding: 2rem 2.5rem;
        }
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 1.2rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            background: #f9f9f9;
            transition: border 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #00bcd4;
            outline: none;
        }
        button[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background: #00bcd4;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0097a7;
        }
        .form-error {
            color: #d32f2f;
            font-size: 0.95rem;
            margin-top: 0.3rem;
        }
        .container p {
            text-align: center;
            margin-top: 1.5rem;
        }
        .container a {
            color: #00bcd4;
            text-decoration: none;
        }
        .container a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            color: #888;
            padding: 1.5rem 0 0.5rem 0;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('blog.index') }}">Home</a></li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Laravel Blog. All rights reserved.</p>
    </footer>
</body>
</html>