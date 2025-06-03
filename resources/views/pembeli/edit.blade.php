@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h4 class="fw-bold mb-4">Edit Pembeli</h4>
            <form action="{{ route('pembeli.update', $pembeli->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pembeli->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="L" {{ $pembeli->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $pembeli->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $pembeli->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $pembeli->no_hp }}" required>
                </div>

                <button type="submit"  class="btn text-white fw-bold" style="background-color: #ff5ca8; border-radius: 10px;">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #ffe6f0;
    }
    .btn-pink {
        background-color: #ff69b4;
        color: white;
        border: none;
    }
    .btn-pink:hover {
        background-color: #ff85c1;
    }
</style>
@endpush
