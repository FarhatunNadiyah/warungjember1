@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}">
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}">
            @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Gambar lama -->
        @if ($barang->gambar)
            <div class="mb-3">
                <label>Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" width="100">
            </div>
        @endif

        <!-- Input gambar baru -->
        <div class="mb-3">
            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button  class="btn text-white fw-bold" style="background-color: #ff5ca8; border-radius: 10px;">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
