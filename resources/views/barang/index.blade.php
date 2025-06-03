@extends('layouts.app')

@section('content')
<div class="card mt-4 shadow rounded-4">
    <div class="card-header bg-pink text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0"><i class="fa-solid fa-boxes-stacked me-2"></i>Data Barang</h5>
            <a class="btn btn-light text-pink fw-bold rounded-pill px-3" href="{{ url('barang/create') }}">
                <i class="fa fa-plus me-1"></i>Tambah Barang
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card-body p-4">
        <!-- Form Pencarian -->
        <form action="{{ route('kategori.index') }}" method="GET" class="mb-3 d-flex" role="search">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama barang..." value="{{ request('search') }}">
    <div class="col-md-2">
           <button type="submit" class="btn btn-outline-pink fw-bold rounded-pill w-100">
    <i class="fa fa-search me-1"></i> Cari
</button>
    </div>
</form>

        <div class="table-responsive">
            <table class="table align-middle table-hover text-center rounded overflow-hidden shadow-sm">
                <thead class="bg-light text-pink fw-bold">
                    <tr>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $item)
                    <tr style="background-color: #fef3f7;">
                        <td>{{ $item->nama }}</td>
                        <td>
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" width="70" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm fw-bold px-3 rounded-pill">Edit</a>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold px-3 rounded-pill" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data barang masih kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Laravel -->
        <div class="d-flex justify-content-center mt-4">
            {{ $barangs->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </div>

        <!-- Tombol Navigasi Manual ke Halaman Lain -->
        <!-- Tombol Navigasi Manual Gaya Pagination -->
    <div class="d-flex justify-content-center mt-4">
         <ul class="pagination pagination-custom">
        <li class="page-item active"><a class="page-link" href="{{ url('/barang') }}">1</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/kategori') }}">2</a></li>
        <li class="page-item"><a class="page-link" href="{{ url('/pembeli') }}">3</a></li>
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
