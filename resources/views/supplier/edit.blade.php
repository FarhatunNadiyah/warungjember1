@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-3">
        <div class="card-body">
            <h3 class="mb-4">Edit Supplier</h3>
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $supplier->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required>{{ $supplier->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $supplier->kode_pos }}" required>
                </div>
                <button type="submit" class="btn btn-pink">Update</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
