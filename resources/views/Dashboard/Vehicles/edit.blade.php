@extends('layouts.layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manajemen Mobil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Mobil</li>
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
                            <a href="{{ route('mobil.index') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-arrow-left-square"></i> kembali</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Mobil</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('mobil.update', $vehicle->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="seri" class="form-label">Seri</label>
                                    <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" value="{{ old('seri', $vehicle->seri) }}">
                                    @error('seri')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" value="{{ old('jenis', $vehicle->jenis) }}">
                                    @error('jenis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                    <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" name="plat_nomor" value="{{ old('plat_nomor', $vehicle->plat_nomor) }}">
                                    @error('plat_nomor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="warna" class="form-label">Warna</label>
                                    <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna', $vehicle->warna) }}">
                                    @error('warna')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" min="1900" max="2099" step="1"
                                        value="{{ old('tahun', $vehicle->tahun) }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="nomor_mesin" class="form-label">Nomor Mesin</label>
                                    <input type="text" class="form-control @error('nomor_mesin') is-invalid @enderror" name="nomor_mesin" value="{{ old('nomor_mesin', $vehicle->nomor_mesin) }}">
                                    @error('nomor_mesin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="nomor_sasis" class="form-label">Nomor Sasis</label>
                                    <input type="text" class="form-control @error('nomor_sasis') is-invalid @enderror" name="nomor_sasis" value="{{ old('nomor_sasis', $vehicle->nomor_sasis) }}">
                                    @error('nomor_sasis')
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
