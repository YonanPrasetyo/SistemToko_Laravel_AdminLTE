<form action="{{ route('detail-transaksi.store') }}" method="POST">
    @csrf

    <input type="hidden" name="id_transaksi" value="{{ $transaksi['id_transaksi'] }}">

    <div class="mb-3">
        <label for="id_produk" class="form-label">Pilih Produk</label>
        <select name="id_produk" id="id_produk" class="form-control" required>
            <option value="">-- Pilih Produk --</option>
            @foreach ($produk as $p)
                <option value="{{ $p['id_produk'] }}" {{ old('id_produk') == $p['id_produk'] ? 'selected' : '' }}>
                    {{ $p['nama_produk'] }} (Stok: {{ $p['stok'] }}) - Rp {{ number_format($p['harga_jual'], 0, ',', '.') }}/{{ $p['satuan'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', 1) }}" min="1" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
