@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4 p-4">
        <h4 class="fw-bold mb-4">Tambah Kategori</h4>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kategori" required>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit"  class="btn text-white fw-bold" style="background-color: #ff5ca8; border-radius: 10px;">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
