<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(to right, #fce4ec, #f8bbd0);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 350px;
      text-align: center;
    }

    .login-box h2 {
      color: #c2185b;
      margin-bottom: 10px;
    }

    .login-box p {
      color: #880e4f;
      font-size: 14px;
    }

    .input-group {
      margin-top: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      font-weight: bold;
      color: #ad1457;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #f8bbd0;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .login-btn {
      background-color: #f06292;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-btn:hover {
      background-color: #ec407a;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <p>Silakan masuk dengan username dan password</p>
    <form method="POST" action="/login">
        @csrf
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>
    @if (Session::has('pesan'))
    <div class="alert mt-2 {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
        {{ Session::get('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
  </div>
</body>
</html>
