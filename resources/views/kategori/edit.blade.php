@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="max-w-md bg-white p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="nama" value="{{ $kategori->nama }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="flex space-x-2">
            <button class="btn btn-primary">update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
