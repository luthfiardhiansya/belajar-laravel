@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Detail Wali') }}</span>
                    <a href="{{ route('wali.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">
                    <h4 class="fw-bold">{{ $wali->nama }}</h4>
                    <p class="mt-2 mb-1">Nama Mahasiswa: <strong>{{ $wali->mahasiswa->nama }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection