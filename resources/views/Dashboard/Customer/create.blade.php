@extends('layouts.layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manajemen Pelanggan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pelanggan</li>
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
                    {{-- Tombol Create --}}
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-arrow-left-square"></i> kembali</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Pelanggan</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('pelanggan.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                                    @error('nama_pelanggan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="perusahaan" class="form-label">Asal Perusahaan</label>
                                    <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ old('perusahaan') }}">
                                    @error('perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Todo: Create input with checkbox --}}
                                <div class="col-12">
                                    <label for="validasi_ktp" class="form-label">Validasi KTP</label>
                                    <input type="file" name="" id="" class="form-control @error('validasi_ktp') is-invalid @enderror">
                                    {{-- <div class="form-check form-switch">
                                        <input type="hidden" name="validasi_ktp" value="0">
                                        <input class="form-check-input @error('validasi_ktp') is-invalid @enderror" type="checkbox" id="validasi_ktp" name="validasi_ktp" value="{{ old('validasi_ktp') }}">
                                    </div> --}}
                                    @error('validasi_ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="tanggal_validasi_ktp" class="form-label">Tanggal Validasi KTP</label>
                                    <input type="date" class="form-control @error('tanggal_validasi_ktp') is-invalid @enderror" name="tanggal_validasi_ktp" min="1900" max="2099" step="1" value="{{ old('tanggal_validasi_ktp') }}">
                                    @error('tanggal_validasi_ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="5" value="{{ old('alamat') }}"></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
