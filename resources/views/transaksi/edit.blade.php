<form action="{{ route('transaksi.update', $transaksi['id_transaksi']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="id_konsumen" class="form-label">Nama Konsumen</label>
        <select name="id_konsumen" id="id_konsumen" class="form-control" required>
            <option value="">-- Pilih Konsumen --</option>
            @foreach ($konsumen as $k)
                <option value="{{ $k['id_konsumen'] }}"
                    {{ $transaksi['id_konsumen'] == $k['id_konsumen'] ? 'selected' : '' }}>
                    {{ $k['nama'] }} - {{ $k['no_hp'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            value="{{ $transaksi['tanggal'] }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
