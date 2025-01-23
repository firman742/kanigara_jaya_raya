@extends('layouts.layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manajemen Pra-Rental (Mobil keluar)</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item ">Rental</li>
                    <li class="breadcrumb-item active">Pra Rental</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <form class="row g-3" method="POST" action="{{ route('rental.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                        {{-- Tombol Create --}}
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('rental.index') }}" class="btn btn-success mt-3 rounded rounded-4">
                                    <i class="bi bi-arrow-left-square"></i> kembali
                                </a>
                            </div>
                        </div>
                        {{-- Informasi Dasar --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Informasi Dasar</h5>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="col-md-12">
                                                <label for="pelanggan_id" class="form-label">Nama Pelanggan</label>
                                                <select class="form-select mb-3 @error('pelanggan_id') is-invalid @enderror"
                                                    aria-label="Nama Pelangan" name="pelanggan_id" id="pelanggan_id">
                                                    <option selected>Pilihan Nama Pelanggan</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->nama_pelanggan }} -
                                                            {{ $customer->perusahaan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pelanggan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="pengemudi_id" class="form-label">Nama Pengemudi</label>
                                                <select class="form-select mb-3 @error('pengemudi_id') is-invalid @enderror"
                                                    aria-label="Nama Pengemudi" name="pengemudi_id" id="pengemudi_id">
                                                    <option selected>Pilihan Nama Pengemudi</option>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}">{{ $driver->nama_pengemudi }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pengemudi_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="vehicle_id" class="form-label">Nama Kendaraan</label>
                                                <select class="form-select mb-3 @error('vehicle_id') is-invalid @enderror"
                                                    aria-label="Nama Pengemudi" name="vehicle_id" id="vehicle_id">
                                                    <option selected>Pilihan Nama Kendaraan</option>
                                                    @foreach ($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->seri }} -
                                                            {{ $vehicle->plat_nomor }}</option>
                                                    @endforeach
                                                </select>
                                                @error('vehicle_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="note" class="form-label">Catatan</label>
                                                <textarea class="form-control mb-3 @error('note') is-invalid @enderror" name="note" id="note" rows="5"
                                                    value="{{ old('note') }}"></textarea>
                                                @error('note')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{-- keluar --}}
                                                    <h5 class="fw-bold">Keluar</h5>
                                                    <div class="col-md-12">
                                                        <label for="tanggal_mulai" class="form-label">Tanggal Keluar</label>
                                                        <input type="date"
                                                            class="form-control mb-3 @error('tanggal_mulai') is-invalid @enderror"
                                                            name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                                                        @error('tanggal_mulai')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="tanggal_rencana_kembali" class="form-label">Tanggal Rencana kembali</label>
                                                        <input type="date"
                                                            class="form-control mb-3 @error('tanggal_rencana_kembali') is-invalid @enderror"
                                                            name="tanggal_rencana_kembali" value="{{ old('tanggal_rencana_kembali') }}">
                                                        @error('tanggal_rencana_kembali')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="mulai_km" class="form-label">Kilometer</label>
                                                        <input type="number"
                                                            class="form-control mb-3 @error('mulai_km') is-invalid @enderror"
                                                            name="mulai_km" value="{{ old('mulai_km') }}">
                                                        @error('mulai_km')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="bahan_bakar_masuk" class="form-label">BBM</label>
                                                            <select name="bahan_bakar_masuk" id="bahan_bakar_masuk" class="form-select mb-3">
                                                                <option value="Fuel">Fuel</option>
                                                                <option value="1/8 F">1/8 F</option>
                                                                <option value="1/4 F">1/4 F</option>
                                                                <option value="3/4 F">3/4 F</option>
                                                            </select>
                                                        @error('bahan_bakar_masuk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Masuk --}}
                                                    <h5 class="fw-bold">Kembali</h5>

                                                    <div class="col-md-12">
                                                        <label for="tanggal_akhir" class="form-label">Tanggal</label>
                                                        <input type="date"
                                                            class="form-control mb-3 @error('tanggal_akhir') is-invalid @enderror"
                                                            name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" disabled>
                                                        @error('tanggal_akhir')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="akhir_km" class="form-label">Kilometer</label>
                                                        <input type="number"
                                                            class="form-control mb-3 @error('akhir_km') is-invalid @enderror"
                                                            name="akhir_km" value="{{ old('akhir_km') }}" disabled>
                                                        @error('akhir_km')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="bahan_bakar_habis" class="form-label">BBM</label>
                                                        <select name="bahan_bakar_habis" id="bahan_bakar_habis" class="form-select mb-3" disabled>
                                                            <option value="Fuel">Fuel</option>
                                                            <option value="1/8 F">1/8 F</option>
                                                            <option value="1/4 F">1/4 F</option>
                                                            <option value="3/4 F">3/4 F</option>
                                                        </select>
                                                        @error('bahan_bakar_habis')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Kerusakan --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Pengecekan kerusakan</h5>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Keluar</h6>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="out_foto_depan">Bagian Depan</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="out_foto_depan" id="out_foto_depan" accept="image/*" onchange="previewImage(this, '#out_preview_depan')">
                                                        <img id="out_preview_depan" class="img-preview" src="#" alt="Pratinjau Gambar Depan" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="out_foto_ elakang">Bagian Belakang</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="out_foto_belakang" id="out_foto_belakang" accept="image/*" onchange="previewImage(this, '#out_preview_belakang')">
                                                        <img id="out_preview_belakang" class="img-preview" src="#" alt="Pratinjau Gambar Belakang" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="out_foto_kanan">Bagian Kanan</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="out_foto_kanan" id="out_foto_kanan" accept="image/*" onchange="previewImage(this, '#out_preview_kanan')">
                                                        <img id="out_preview_kanan" class="img-preview" src="#" alt="Pratinjau Gambar Kanan" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="out_foto_kiri">Bagian Kiri</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="out_foto_kiri" id="out_foto_kiri" accept="image/*" onchange="previewImage(this, '#out_preview_kiri')">
                                                        <img id="out_preview_kiri" class="img-preview" src="#" alt="Pratinjau Gambar kiri" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Kembali</h6>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="back_foto_depan">Bagian Depan</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="back_foto_depan" id="back_foto_depan" accept="image/*" onchange="previewImage(this, '#back_preview_depan')" disabled>
                                                        <img id="back_preview_depan" class="img-preview" src="#" alt="Pratinjau Gambar Depan" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="back_foto_ elakang">Bagian Belakang</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="back_foto_belakang" id="back_foto_belakang" accept="image/*" onchange="previewImage(this, '#back_preview_belakang')" disabled>
                                                        <img id="back_preview_belakang" class="img-preview" src="#" alt="Pratinjau Gambar Belakang" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="back_foto_kanan">Bagian Kanan</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="back_foto_kanan" id="back_foto_kanan" accept="image/*" onchange="previewImage(this, '#back_preview_kanan')" disabled>
                                                        <img id="back_preview_kanan" class="img-preview" src="#" alt="Pratinjau Gambar Kanan" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="back_foto_kiri">Bagian Kiri</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="back_foto_kiri" id="back_foto_kiri" accept="image/*" onchange="previewImage(this, '#back_preview_kiri')" disabled>
                                                        <img id="back_preview_kiri" class="img-preview" src="#" alt="Pratinjau Gambar kiri" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        {{-- inspeksi ceklis --}}
                        {{-- <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pengecekan Komponen</h5>
                                <span>note : B = Baik, R = Rusak, H = Hilang, T = Tidak ada</span>
                            </div>
                            <div class="card-body">

                                <!-- Table with hoverable rows -->
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr class="table-primary">
                                            <th rowspan="2">NO</th>
                                            <th rowspan="2">Nama Komponen</th>
                                            <th colspan="4" class="table-secondary">Keluar</th>
                                            <th colspan="4" class="table-primary">Masuk</th>
                                        </tr>
                                        <tr>
                                            <th>B</th>
                                            <th>R</th>
                                            <th>H</th>
                                            <th>T</th>
                                            <th>B</th>
                                            <th>R</th>
                                            <th>H</th>
                                            <th>T</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($components as $component)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $component->nama_komponen }}</td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with hoverable rows -->


                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
