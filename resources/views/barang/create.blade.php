@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Barang</h2>

    <!-- Perhatikan: Tambah enctype agar bisa upload file -->
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
            <div>
                <select name="kategori_id" id="kategori_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
            @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- ✅ Tambahkan input untuk upload gambar -->
        <div class="mb-3">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button  class="btn text-white fw-bold" style="background-color: #ff5ca8; border-radius: 10px;">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
