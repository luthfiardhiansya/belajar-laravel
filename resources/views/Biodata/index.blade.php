@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Biodata</h2>
        <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>JK</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Tinggi</th>
                    <th>Berat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biodatas as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td>{{ $data->jk }}</td>
                        <td>{{ $data->agama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                            @if($data->foto)
                                <img src="{{ asset('storage/' . $data->foto) }}" width="50">
                            @endif
                        </td>
                        <td>{{ $data->tinggi_badan }}</td>
                        <td>{{ $data->berat_badan }}</td>
                        <td>
                            <a href="{{ route('biodata.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('biodata.destroy', $data->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection