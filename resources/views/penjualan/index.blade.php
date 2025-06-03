@extends('layouts.app')

@section('title', 'Daftar Penjualan')

@section('content')
@include('message.message')

<div class="card mt-4 shadow rounded-4">
    <div class="card-header bg-pink text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0"><i class="fa-solid fa-cart-shopping me-2"></i>Data Penjualan</h5>
            <a class="btn btn-light text-pink fw-bold rounded-pill px-3" href="{{ url('penjualan/create') }}">
                <i class="fa fa-plus me-1"></i>Tambah Penjualan
            </a>
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get" class="mb-3">
            <div class="row g-2 align-items-center">
                <div class="col-md-3">
                    <input type="date" name="tgl_awal" class="form-control rounded-pill shadow-sm" placeholder="Tanggal Awal">
                </div>
                <div class="col-md-1 text-center fw-bold">s/d</div>
                <div class="col-md-3">
                    <input type="date" name="tgl_akhir" class="form-control rounded-pill shadow-sm" placeholder="Tanggal Akhir">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Cari" class="btn btn-outline-pink fw-bold rounded-pill w-100">
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ url('cetak/penjualan') }}" target="_blank" class="btn btn-outline-danger rounded-pill fw-bold px-4">
                        <i class="fa-solid fa-file-pdf me-1"></i> Cetak PDF
                    </a>
                </div>
            </div>
            <div class="row mt-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control rounded-pill shadow-sm" placeholder="Cari pembeli atau kasir..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
           <button type="submit" class="btn btn-outline-pink fw-bold rounded-pill w-100">
    <i class="fa fa-search me-1"></i> Cari
</button>

        </div>
    </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center rounded">
                <thead class="bg-light text-pink fw-bold">
                    <tr>
                        <th>No</th>
                        <th>Nama Kasir</th>
                        <th>Pembeli</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($penjualans->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">💔 Tidak ada data penjualan ditemukan!</td>
                        </tr>
                    @else
                        @foreach($penjualans as $d => $r)
                        <tr>
                            <td>{{ $d + 1 }}</td>
                            <td>{{ $r->kasir->username }}</td>
                            <td>{{ $r->pembeli->nama }}</td>
                            <td>{{ $r->tanggal_pesan }}</td>
                            <td>
                                <form action="{{ url('penjualan/' . $r->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('penjualan/' . $r->id) }}" class="btn btn-info btn-sm rounded-pill px-3">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm rounded-pill px-3">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
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
        <li class="page-item"><a class="page-link" href="{{ url('/pembelian') }}">5</a></li>
        <li class="page-item active"><a class="page-link" href="{{ url('/penjualan') }}">6</a></li>
    </ul>
</div>

    </div>

    <div class="card-footer bg-light rounded-bottom-4">
        {{ $penjualans->links() }}
    </div>
</div>

<!-- Tambahan CSS -->
@push('styles')
<style>
    .text-pink {
        color: #e83e8c !important;
    }
    .btn-outline-pink {
        border: 1px solid #e83e8c;
        color: #e83e8c;
    }
    .btn-outline-pink:hover {
        background-color: #e83e8c;
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
@endsection
