<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="id_konsumen" class="form-label">Nama Konsumen</label>
        <select name="id_konsumen" id="id_konsumen" class="form-control" required>
            <option value="">-- Pilih Konsumen --</option>
            @foreach ($konsumen as $item)
                <option value="{{ $item['id_konsumen'] }}" {{ old('id_konsumen') == $item['id_konsumen'] ? 'selected' : '' }}>
                    {{ $item['nama'] }} - {{ $item['no_hp'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            value="{{ old('tanggal', date('Y-m-d')) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
