@extends('adminlte::page')

@section('title', 'Data Produk')

@section('content_header')
    <h1>Data Produk</h1>
@endsection

@include('components.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahProdukModal">
                <i class="fa fa-plus"></i> Tambah Produk
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importProdukModal">
                <i class="fa fa-file-excel"></i> Import Produk
            </button>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['nama_produk'] }}</td>
                            <td>{{ $item['kategori']['nama_kategori'] }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>{{ $item['satuan'] }}</td>
                            <td>Rp. {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($item['harga_jual'], 0, ',', '.') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProdukModal{{ $item['id_produk'] }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusProdukModal{{ $item['id_produk'] }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Edit Produk --}}
                        <div class="modal fade" id="editProdukModal{{ $item['id_produk'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('produk.edit', ['produk' => $item])
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Edit Produk --}}

                        {{-- Modal Hapus Produk --}}
                        <div class="modal fade" id="hapusProdukModal{{ $item['id_produk'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusProdukModalLabel">Hapus Produk</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                                        <form action="{{ route('produk.destroy', $item['id_produk']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Hapus Produk --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('produk.create')
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Produk -->

    <!-- Modal Import Produk -->
    <div class="modal fade" id="importProdukModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Produk dari Excel</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File Excel (.xlsx/.xls)</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Import Produk -->

@endsection

