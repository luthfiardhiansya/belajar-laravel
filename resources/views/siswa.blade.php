<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>{{$kelas}}</h1></center>
    @foreach ($data as $bio)
    Nama: {{ $bio['nama_siswa'] }} <br>
    Mata pelajaran: {{ $bio['mapel'] }} <br>
    Nilai: {{ $bio['nilai'] }} <br>

    @if ($bio['nilai'] > 75)
    keterangan: lulus
    @else 
    keterangan: tidak lulus
        
    @endif
    <hr>
    @endforeach
</body>
</html>