@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
<div class="card mt-4 shadow rounded-4">
    <div class="card-header bg-pink text-white rounded-top-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-receipt me-2"></i>Detail Penjualan</h5>
        <a class="btn btn-light text-pink fw-bold rounded-pill px-3" href="{{ url('penjualan') }}">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <div class="mb-4">
            <table class="table table-borderless">
                <tr>
                    <td width="20%" class="fw-semibold text-pink">Nomor Transaksi</td>
                    <td width="2%">:</td>
                    <td>{{ $penjualan->id }}</td>
                </tr>
                <tr>
                    <td class="fw-semibold text-pink">Kasir</td>
                    <td>:</td>
                    <td>{{ $penjualan->kasir->username }}</td>
                </tr>
                <tr>
                    <td class="fw-semibold text-pink">Pembeli</td>
                    <td>:</td>
                    <td>{{ $penjualan->pembeli->nama }}</td>
                </tr>
                <tr>
                    <td class="fw-semibold text-pink">Tanggal</td>
                    <td>:</td>
                    <td>{{ $penjualan->tanggal_pesan }}</td>
                </tr>
            </table>
        </div>

        <h5 class="fw-bold text-pink">🛒 Daftar Barang</h5>
        <hr class="border-pink">

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center table-bordered">
                <thead class="bg-light text-pink fw-bold">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $tot = 0; @endphp
                    @foreach ($detail as $d => $dd)
                        <tr>
                            <td>{{ $d + 1 }}</td>
                            <td>{{ $dd->barang->nama }}</td>
                            <td>{{ $dd->jumlah }}</td>
                            <td>Rp. {{ number_format($dd->barang->harga, 0, '.', '.') }}</td>
                            <td>Rp. {{ number_format($dd->total_harga, 0, '.', '.') }}</td>
                            @php $tot += $dd->total_harga; @endphp
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total :</td>
                        <td class="fw-bold text-pink">Rp. {{ number_format($tot, 0, '.', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card-footer bg-light text-end rounded-bottom-4">
        <a href="{{ url('cetak/detailpenjualan/' . $penjualan->id) }}" target="_blank" class="btn btn-outline-success rounded-pill px-4 fw-bold">
            <i class="fa-solid fa-file-pdf me-1"></i> Cetak PDF
        </a>
    </div>
</div>

<!-- Tambahan CSS -->
@push('styles')
<style>
    .text-pink {
        color: #e83e8c !important;
    }
    .bg-pink {
        background-color: #e83e8c !important;
    }
    .border-pink {
        border-color: #e83e8c !important;
    }
</style>
@endpush
@endsection
