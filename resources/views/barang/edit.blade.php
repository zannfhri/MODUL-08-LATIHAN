<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container-sm my-5">
            <form action="{{ route('barangs.update', ['id' => $barangs->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="row justify-content-center">
                    <div class="p-5 bg-light rounded-3 col-xl-6">
                        <div class="mb-3 text-center">
                            <i class="bi-person-circle fs-1"></i>
                            <h4>Edit Barang</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kodeBarang" class="form-label">Kode Barang</label>
                                <input class="form-control @error('kodeBarang') is-invalid @enderror" type="text"
                                    name="kodeBarang" id="kodeBarang"
                                    value="{{ $errors->any() ? old('kodeBarang') : $barangs->kode_barang }}"
                                    placeholder="Masukkan Kode Barang">
                                @error('kodeBarang')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="namaBarang" class="form-label">Nama Barang</label>
                                <input class="form-control @error('namaBarang') is-invalid @enderror" type="text"
                                    name="namaBarang" id="namaBarang"
                                    value="{{ $errors->any() ? old('namaBarang') : $barangs->nama_barang }}"
                                    placeholder="Masukkan Nama Barang">
                                @error('namaBarang')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="hargaBarang" class="form-label">Harga Barang</label>
                                <input class="form-control @error('hargaBarang') is-invalid @enderror" type="text"
                                    name="hargaBarang" id="hargaBarang"
                                    value="{{ $errors->any() ? old('hargaBarang') : $barangs->harga_barang }}"
                                    placeholder="Masukkan Harga Barang">
                                @error('hargaBarang')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="deskripsiBarang" class="form-label">Deskripsi Barang</label>
                                <input class="form-control @error('deskripsiBarang') is-invalid @enderror" type="text"
                                    name="deskripsiBarang" id="deskripsiBarang"
                                    value="{{ $errors->any() ? old('deskripsiBarang') : $barangs->deskripsi_barang }}"
                                    placeholder="Masukkan Deskripsi Barang">
                                @error('deskripsiBarang')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="satuan" class="form-label">Satuan Barang</label>
                                <select name="satuan" id="satuan" class="form-select">
                                    @php
                                        $selected = '';
                                        if ($errors->any()) {

                                            $selected = old('satuan');
                                        } else {
                                            $selected = $barangs->satuan_id;
                                        }
                                    @endphp
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}"
                                            {{ $selected == $satuan->id ? 'selected' : '' }}>
                                            {{ $satuan->code . ' - ' . $satuan->kode_satuan }}</option>
                                    @endforeach
                                </select>
                                @error('satuan')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('barangs.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                        class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
