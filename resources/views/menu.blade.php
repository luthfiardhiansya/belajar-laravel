<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td><center><h1>{{$resto}}</h1></center></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $makanan['nama_makanan'] }}</td>
        </tr>
    @foreach ($data as $makanan)
    Harga:{{ $makanan['harga'] }}
    Jumlah:{{ $makanan['jumlah'] }}
    Total:{{ $total }} 
    </table>
    @php
    $total = $makanan['jumlah'] * $makanan['harga'];
    @endphp
    <hr>
    @endforeach
</body>
</html>