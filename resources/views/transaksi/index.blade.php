@extends('adminlte::page')

@section('title', 'Data Transaksi')

@section('content_header')
    <h1>Data Transaksi</h1>
@endsection

@include('components.template')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTransaksiModal">
            <i class="fa fa-plus"></i> Tambah Transaksi
        </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Konsumen</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['konsumen']['nama'] }}</td>
                        <td>{{ $item['konsumen']['alamat'] }}</td>
                        <td>{{ $item['konsumen']['no_hp'] }}</td>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>Rp {{ number_format($item['total'], 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $item['id_transaksi']) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTransaksiModal{{ $item['id_transaksi'] }}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusTransaksiModal{{ $item['id_transaksi'] }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Edit Transaksi -->
                    <div class="modal fade" id="editTransaksiModal{{ $item['id_transaksi'] }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Transaksi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('transaksi.edit', ['transaksi' => $item])
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit -->

                    <!-- Modal Hapus Transaksi -->
                    <div class="modal fade" id="hapusTransaksiModal{{ $item['id_transaksi'] }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Transaksi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Yakin ingin menghapus transaksi ini?</p>
                                    <form action="{{ route('transaksi.destroy', $item['id_transaksi']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Hapus -->
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Transaksi -->
<div class="modal fade" id="tambahTransaksiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('transaksi.create')
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->
@endsection
