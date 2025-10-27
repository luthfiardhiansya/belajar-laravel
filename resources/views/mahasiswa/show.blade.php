@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Detail Mahasiswa') }}</span>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">
                    <h4 class="fw-bold">{{ $mahasiswa->nama }}</h4>
                    <p class="mt-2 mb-1">nim: <strong>{{ $mahasiswa->nim }}</strong></p>
                    <p class="mt-2 mb-1">Nama Dosen: <strong>{{ $mahasiswa->dosen->nama }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection