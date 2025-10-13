@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Detail Biodata') }}</span>
                    <a href="{{ route('biodata.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">
                    {{-- Foto --}}
                    @if ($biodatum->foto)
                        <img src="{{ Storage::url($biodatum->foto) }}" class="w-100 rounded mb-3" alt="{{ $biodatum->nama }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="w-100 rounded mb-3" alt="No Image">
                    @endif

                    {{-- Data Biodata --}}
                    <h4 class="fw-bold">{{ $biodatum->nama }}</h4>
                    <p class="mt-2 mb-1"><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($biodatum->tgl_lahir)->format('d-m-Y') }}</p>
                    <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ ucfirst($biodatum->jk) }}</p>
                    <p class="mb-1"><strong>Agama:</strong> {{ $biodatum->agama }}</p>
                    <p class="mb-1"><strong>Alamat:</strong> {{ $biodatum->alamat }}</p>
                    <p class="mb-1"><strong>Tinggi Badan:</strong> {{ $biodatum->tinggi_badan ?? '-' }} cm</p>
                    <p class="mb-1"><strong>Berat Badan:</strong> {{ $biodatum->berat_badan ?? '-' }} kg</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
