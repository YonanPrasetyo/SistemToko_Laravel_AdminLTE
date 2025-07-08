<form action="{{ route('konsumen.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Konsumen</label>
        <input type="text" name="nama" id="nama" class="form-control"
            value="{{ old('nama') }}" required>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control"
            value="{{ old('no_hp') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
