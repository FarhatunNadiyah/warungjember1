@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Daftar Akun</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama" required autofocus>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
            </div>
            <button class="btn btn-pink w-100">Daftar</button>
        </form>

        <div class="mt-3 text-center">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</div>
@endsection
