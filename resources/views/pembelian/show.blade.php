@extends('layouts.app')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    <h5>Daftar Pembelian Barang</h5>
                </div>
                <div class="ms-auto p-2 bd-highlight">
                    <a class="btn btn-primary btn-sm" href="{{url('pembelian/create')}}"><i class="fa fa-plus"></i> Tambah Pembelian</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pembelian->isEmpty())
                        <tr>
                            <td colspan="6" align="center">Tidak ada data!</td>
                        </tr>
                    @else
                        @foreach($pembelian as $d=>$r)
                            <tr>
                                <td>{{$d+1}}</td>
                                <td>{{$r->barang->nama}}</td>
                                <td>{{$r->supplier->nama}}</td>
                                <td>{{$r->jumlah}}</td>
                                <td>{{$r->tanggal}}</td>
                                <td>
                                    <form action="{{url('pembelian/'.$r->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('pembelian/'.$r->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                        <input onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" type="submit" class="btn btn-danger btn-sm" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pembelian->links() }}
        </div>

    </div>

@endsection
