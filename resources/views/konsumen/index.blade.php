@extends('adminlte::page')

@section('title', 'Data Konsumen')

@section('content_header')
    <h1>Data Konsumen</h1>
@endsection

@include('components.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKonsumenModal">
                <i class="fa fa-plus"></i> Tambah Konsumen
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($konsumen as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['alamat'] }}</td>
                            <td>{{ $item['no_hp'] }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editKonsumenModal{{ $item['id_konsumen'] }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusKonsumenModal{{ $item['id_konsumen'] }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Edit Konsumen --}}
                        <div class="modal fade" id="editKonsumenModal{{ $item['id_konsumen'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Konsumen</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('konsumen.edit', ['konsumen' => $item])
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Edit Konsumen --}}

                        {{-- Modal Hapus Konsumen --}}
                        <div class="modal fade" id="hapusKonsumenModal{{ $item['id_konsumen'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Konsumen</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus konsumen ini?</p>
                                        <form action="{{ route('konsumen.destroy', $item['id_konsumen']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Hapus Konsumen --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Konsumen -->
    <div class="modal fade" id="tambahKonsumenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Konsumen</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('konsumen.create')
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Konsumen -->
@endsection
