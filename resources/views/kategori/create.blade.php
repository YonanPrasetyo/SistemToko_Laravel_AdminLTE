<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
            value="{{ old('nama_kategori') }}" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi (opsiional)</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
