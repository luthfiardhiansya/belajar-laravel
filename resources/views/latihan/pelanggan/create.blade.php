@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Data Pelanggan</div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.store') }}" method="post">
                         @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control 
                            @error('nama') is-invalid @enderror">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Pelanggan</label>
                            <input type="text" name="alamat" class="form-control 
                            @error('alamat') is-invalid @enderror">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Handphone</label>
                            <input type="varchar" name="no_telepon" class="form-control 
                            @error('no_telepon') is-invalid @enderror">
                            @error('no_telepon')
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