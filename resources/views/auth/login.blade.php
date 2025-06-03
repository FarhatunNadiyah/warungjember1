@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f8d7da !important;
    }
    .login-box {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        max-width: 400px;
        margin: 60px auto;
    }
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #e83e8c;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    h2 {
        text-align: center;
        color: #e83e8c;
    }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
