<form action="{{ route('produk.update', $produk['id_produk']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control"
            value="{{ $produk['nama_produk'] }}" required>
    </div>

    <div class="mb-3">
        <label for="id_kategori" class="form-label">Kategori</label>
        <select name="id_kategori" id="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $item)
                <option value="{{ $item['id_kategori'] }}"
                    {{ $item['id_kategori'] == $produk['id_kategori'] ? 'selected' : '' }}>
                    {{ $item['nama_kategori'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control"
            value="{{ $produk['stok'] }}" min="0" required>
    </div>

    <div class="mb-3">
        <label for="harga_beli" class="form-label">Harga Beli</label>
        <input type="number" step="0.01" name="harga_beli" id="harga_beli" class="form-control"
            value="{{ $produk['harga_beli'] }}" required>
    </div>

    <div class="mb-3">
        <label for="harga_jual" class="form-label">Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" id="harga_jual" class="form-control"
            value="{{ $produk['harga_jual'] }}" required>
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control"
            value="{{ $produk['satuan'] }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
