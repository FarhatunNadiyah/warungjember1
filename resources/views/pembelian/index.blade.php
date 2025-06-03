@extends('layouts.app')

@section('content')
<div class="card mt-4 shadow rounded-4">
    <div class="card-header bg-pink text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0"><i class="fa-solid fa-cart-shopping me-2"></i>Data Pembelian</h5>
            <a class="btn btn-light text-pink fw-bold rounded-pill px-3" href="{{ url('pembelian/create') }}">
                <i class="fa fa-plus me-1"></i>Tambah Pembelian
            </a>
        </div>
    </div>


    <div class="card shadow rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('kategori.index') }}" method="GET" class="mb-3 d-flex" role="search">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama barang..." value="{{ request('search') }}">
   <div class="col-md-2">
         <button type="submit" class="btn btn-outline-pink fw-bold rounded-pill w-100">
    <i class="fa fa-search me-1"></i> Cari
     </button>
    </div>
</form>
            <div class="table-responsive">
                <table class="table align-middle text-center table-hover rounded overflow-hidden">
                    <thead class="bg-light text-pink fw-bold">
                        <tr>
                            <th>Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembelians as $pembelian)
                        <tr style="background-color: #fef3f7;">
                            <td>{{ $pembelian->barang->nama }}</td>
                            <td>{{ $pembelian->supplier->nama }}</td>
                            <td>{{ $pembelian->jumlah }}</td>
                            <td>{{ $pembelian->tanggal }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="btn btn-warning btn-sm fw-bold rounded-pill px-3">Edit</a>
                                    <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm fw-bold rounded-pill px-3">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">Belum ada data pembelian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Tombol Navigasi Manual Gaya Pagination -->
<div class="d-flex justify-content-center mt-4">
    <ul class="pagination pagination-custom">
        <li class="page-item"><a class="page-link" href="{{ url('/barang') }}">1</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/kategori') }}">2</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/pembeli') }}">3</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/supplier') }}">4</a></li>
        <li class="page-item active"><a class="page-link" href="{{ url('/pembelian') }}">5</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/penjualan') }}">6</a></li>
    </ul>
</div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #ffe6f0;
    }

    .text-pink {
        color: #e83e8c !important;
    }

    .btn-pink {
        background-color: #ff5ca8;
        color: white;
        border: none;
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
