@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="bg-white p-4 rounded shadow-sm">
        <h3>Tambah Pembelian</h3>


        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="barang_id">Barang</label>
                <select name="barang_id" id="barang_id" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier_id">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    <option value="">-- Pilih Supplier --</option>
                    @foreach($supplier as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <button  class="btn text-white fw-bold" style="background-color: #ff5ca8; border-radius: 10px;">Simpan</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #ffdce0;
    }
    .btn-pink {
        background-color: #ff5ca8;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
    }
    .btn-pink:hover {
        background-color: #e14b96;
    }
</style>
@endpush
