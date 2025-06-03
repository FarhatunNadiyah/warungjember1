@extends('layouts.app')

@section('content')
<div class="card mt-4 shadow rounded-4">
    <div class="card-header bg-pink text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-white"><i class="fa-solid fa-user-group me-2"></i>Data Pembeli</h5>
            <a class="btn btn-light text-pink fw-bold rounded-pill px-3" href="{{ url('pembeli/create') }}">
                <i class="fa fa-plus me-1"></i>Tambah Pembeli
            </a>
        </div>
    </div>

    <div class="card-body p-4">
        {{-- Form Pencarian --}}
        <!-- Form Pencarian -->
<form action="{{ route('pembeli.index') }}" method="GET" class="mb-3 d-flex" role="search">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama pembeli..." value="{{ request('search') }}">
    <div class="col-md-2">
        <button type="submit" class="btn btn-outline-pink fw-bold rounded-pill w-100">
            <i class="fa fa-search me-1"></i> Cari
        </button>
    </div>
</form>


        {{-- Tabel --}}
        <div class="table-responsive">
            <table class="table align-middle text-center table-hover rounded overflow-hidden">
                <thead class="bg-light text-pink fw-bold">
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelis as $pembeli)
                    <tr style="background-color: #fef3f7;">
                        <td>{{ $pembeli->nama }}</td>
                        <td>{{ $pembeli->jenis_kelamin }}</td>
                        <td>{{ $pembeli->alamat }}</td>
                        <td>{{ $pembeli->no_hp }}</td>
                        <td>
                            <a href="{{ route('pembeli.edit', $pembeli->id) }}" class="btn btn-warning btn-sm fw-bold rounded-pill px-3">Edit</a>
                            <form action="{{ route('pembeli.destroy', $pembeli->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm fw-bold rounded-pill px-3" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada pembeli</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Navigasi Halaman --}}
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination pagination-custom">
                <li class="page-item"><a class="page-link" href="{{ url('/barang') }}">1</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/kategori') }}">2</a></li>
                <li class="page-item active"><a class="page-link" href="{{ url('/pembeli') }}">3</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/supplier') }}">4</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/pembelian') }}">5</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/penjualan') }}">6</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .text-pink {
        color: #e83e8c !important;
    }

    .btn-pink {
        background-color: #ff5ca8;
        color: white;
    }

    .btn-pink:hover {
        background-color: #e83e8c;
        color: white;
    }

    .btn-outline-pink {
        border: 2px solid #ff5ca8;
        color: #ff5ca8;
        background-color: white;
    }

    .btn-outline-pink:hover {
        background-color: #ff5ca8;
        color: white;
        transition: 0.3s ease;
    }

    .pagination-custom {
        gap: 8px;
    }

    .pagination-custom .page-link {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        line-height: 38px;
        text-align: center;
        font-weight: bold;
        background-color: #ffe4f2;
        color: #e83e8c;
        border: none;
        transition: all 0.3s ease;
    }

    .pagination-custom .page-link:hover {
        background-color: #ff5ca8;
        color: white;
        transform: rotate(-5deg) scale(1.1);
    }

    .pagination-custom .active .page-link {
        background-color: #e83e8c;
        color: white;
        box-shadow: 0 0 10px rgba(255, 92, 168, 0.5);
        transform: scale(1.1);
    }
</style>
@endpush
