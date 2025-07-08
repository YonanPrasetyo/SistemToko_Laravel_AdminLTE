@extends('adminlte::page')

@section('title', 'Detail Transaksi')

@include('components.template')

@section('content_header')
    <h1>Detail Transaksi</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Informasi Transaksi</strong>
        </div>
        <div class="card-body">
            <p><strong>Nama Konsumen:</strong> {{ $transaksi['konsumen']['nama'] }}</p>
            <p><strong>Alamat:</strong> {{ $transaksi['konsumen']['alamat'] }}</p>
            <p><strong>No. HP:</strong> {{ $transaksi['konsumen']['no_hp'] }}</p>
            <p><strong>Tanggal Transaksi:</strong> {{ $transaksi['tanggal'] }}</p>
            <p><strong>Total Transaksi:</strong> Rp {{ number_format($transaksi['total'], 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Detail Produk</strong>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahDetailModal">
                <i class="fa fa-plus"></i> Tambah Produk
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi['detail_transaksi'] as $i => $detail)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $detail['produk']['nama_produk'] }}</td>
                            <td>Rp {{ number_format($detail['harga_satuan'], 0, ',', '.') }}</td>
                            <td>{{ $detail['jumlah'] }}</td>
                            <td>Rp {{ number_format($detail['total'], 0, ',', '.') }}</td>
                            <td>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('detail-transaksi.destroy', $detail['id_detail_transaksi']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Produk ke Transaksi --}}
    <div class="modal fade" id="tambahDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk ke Transaksi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('transaksi.detail_transaksi.create')
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Tambah --}}


    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
