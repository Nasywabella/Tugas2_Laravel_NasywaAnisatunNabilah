<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Author</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #eaf1f8;
        padding: 40px;
    }

    h1 {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 30px;
        color: #2c3e50;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #d1d9e0;
        padding: 12px 15px;
        text-align: left;
        vertical-align: top;
    }

    th {
        background-color: #2c3e50;
        color: #ffffff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f7fbff;
    }

    tr:hover {
        background-color: #dce6f0;
        transition: background-color 0.3s ease;
    }

    img {
        max-width: 100px;
        height: auto;
        border-radius: 8px;
    }
    </style>
</head>
<body>
    <h1>Selamat Datang di toko BookSales!</h1>
    <p>Ini adalah halaman penulis dari toko buku.</p>  

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td><img src="{{ asset('images/' . $item['photo']) }}" alt="{{ $item['name'] }}"></td>
                <td>{{ $item['bio'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
