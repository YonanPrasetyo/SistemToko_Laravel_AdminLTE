<form action="{{ route('konsumen.update', $konsumen['id_konsumen']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Konsumen</label>
        <input type="text" name="nama" id="nama" class="form-control"
            value="{{ $konsumen['nama'] }}" required>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $konsumen['alamat'] }}</textarea>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control"
            value="{{ $konsumen['no_hp'] }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
