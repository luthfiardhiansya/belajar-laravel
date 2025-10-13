<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $biodatum->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $biodatum->tgl_lahir ?? '') }}">
</div>

<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jk" class="form-control">
        <option value="">--Pilih--</option>
        <option value="Laki-laki" {{ old('jk', $biodatum->jk ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jk', $biodatum->jk ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label>Agama</label>
    <select name="agama" class="form-control">
        <option value="">-- Pilih Agama --</option>
        @php
            $daftarAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        @endphp
        @foreach ($daftarAgama as $agama)
            <option value="{{ $agama }}" {{ old('agama', $biodatum->agama ?? '') == $agama ? 'selected' : '' }}>
                {{ $agama }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $biodatum->alamat ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Foto</label><br>
    @if(isset($biodatum) && $biodatum->foto)
        <img src="{{ asset('storage/' . $biodatum->foto) }}" width="80" class="mb-2"><br>
    @endif
    <input type="file" name="foto" class="form-control">
</div>

<div class="mb-3">
    <label>Tinggi Badan (cm)</label>
    <input type="number" name="tinggi_badan" class="form-control"
        value="{{ old('tinggi_badan', $biodatum->tinggi_badan ?? '') }}">
</div>

<div class="mb-3">
    <label>Berat Badan (kg)</label>
    <input type="number" name="berat_badan" class="form-control"
        value="{{ old('berat_badan', $biodatum->berat_badan ?? '') }}">
</div>