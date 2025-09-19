<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>{{$toko_tulis}}</h1></center>
    @foreach ($data as $alat)
    Alat: {{ $alat['alat_tulis'] }} <br>
    Harga: {{ $alat['harga'] }} <br>
    Qty: {{ $alat['qty'] }}
    @php
    $total = $alat['qty'] * $alat['harga'];
    @endphp <br>
    Total: {{ $total }} 
    <hr>
        
    @endforeach
</body>
</html>