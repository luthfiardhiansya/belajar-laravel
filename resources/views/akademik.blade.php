<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <b>
            <center>Grading Nilai Akademik Siswa</center><br>
            Nama Siswa : {{ $a }} <br>
            Nilai : {{ $b }} <br>

            @if($b >= 90)
            Keterangan : Grade A
            @elseif($b >= 80)
            Keterangan : Grade B
            @elseif($b >= 70)
            Keterangan : Grade C
            @elseif($b >= 60)
            Keterangan : Grade D
            @elseif($b < 60)
            Keterangan : Grade E
            @else
            Keterangan : Tidak Masuk Grade
            @endif
        </b>
    </fieldset>
</body>
</html>