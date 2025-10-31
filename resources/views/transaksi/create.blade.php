@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Data Pelanggan</div>
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}" method="post">
                         @csrf
                        <div class="mb-3">
                            <label class="form-label">Kode Transaksi</label>
                            <input type="text" name="kode_transaksi" class="form-control 
                            @error('kode_transaksi') is-invalid @enderror">
                            @error('kode_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Transaksi</label>
                            <input type="date" name="tanggal" class="form-control 
                            @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <select name="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror">
                                @foreach ($pelanggans as $data)
                                    <option value="{{ $data->id }}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('id_pelanggan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Harga</label>
                            <input type="varchar" name="total_harga" class="form-control 
                            @error('total_harga') is-invalid @enderror">
                            @error('total_harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>