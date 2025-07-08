@extends('adminlte::page')

@section('title', 'Data Kategori')

@section('content_header')
    <h1>Data Kategori</h1>
@endsection

@include('components.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategoriModal">
                <i class="fa fa-plus"></i> Tambah Kategori
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['nama_kategori'] }}</td>
                            <td>{{ $item['deskripsi'] }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editKategoriModal{{ $item['id_kategori'] }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusKategoriModal{{ $item['id_kategori'] }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Edit Kategori --}}
                        <div class="modal fade" id="editKategoriModal{{ $item['id_kategori'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('kategori.edit', ['kategori' => $item])
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Edit Kategori --}}

                        {{-- Modal Hapus Kategori --}}
                        <div class="modal fade" id="hapusKategoriModal{{ $item['id_kategori'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusKategoriModalLabel">Hapus Kategori</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
                                        <form action="{{ route('kategori.destroy', $item['id_kategori']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Hapus Kategori --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('kategori.create')
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Kategori -->
@endsection

