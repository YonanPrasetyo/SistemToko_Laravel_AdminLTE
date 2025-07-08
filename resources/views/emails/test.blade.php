<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Test Email Laravel</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background-color: #007bff; color: #ffffff; padding: 20px;">
            <h2 style="margin: 0;">Uji Coba Email Laravel</h2>
        </div>

        <div style="padding: 20px;">
            <p>Halo,</p>

            <p>Ini adalah email uji coba yang dikirim dari aplikasi Laravel.</p>

            <p><strong>Pesan:</strong></p>
            <p style="background-color: #f1f1f1; padding: 10px; border-left: 4px solid #007bff;">
                {{ "top 5 produk yonan store dalam 30  hari terakhir" }}
            </p>

            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID produk</th>
                        <th>nama produk</th>
                        <th>total terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($top5produk as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->id_produk }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->total_terjual }}</td>
                    @endforeach
                </tbody>
            </table>

            <p>Terima kasih telah menggunakan layanan kami.</p>

            <p style="margin-top: 30px;">Hormat kami,<br><strong>Tim Laravel</strong></p>
        </div>

        <div style="background-color: #f1f1f1; text-align: center; padding: 10px; font-size: 12px; color: #777;">
            &copy; {{ date('Y') }} Laravel App. All rights reserved.
        </div>
    </div>

</body>
</html>
