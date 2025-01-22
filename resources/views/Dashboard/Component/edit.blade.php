@extends('layouts.layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manajemen Pengemudi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pengemudi</li>
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
                            <a href="{{ route('pengemudi.index') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-arrow-left-square"></i> kembali</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Pengemudi</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('pengemudi.update', $driver->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="nama_pengemudi" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama_pengemudi') is-invalid @enderror" name="nama_pengemudi" value="{{ old('nama_pengemudi', $driver->nama_pengemudi) }}">
                                    @error('nama_pengemudi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon', $driver->nomor_telepon) }}">
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="lisensi" class="form-label">Lisensi</label>
                                    <input type="text" class="form-control @error('lisensi') is-invalid @enderror" name="lisensi" value="{{ old('lisensi', $driver->lisensi) }}">
                                    @error('lisensi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="masa_berlaku_lisensi" class="form-label">Masa Berlaku Lisensi</label>
                                    <input type="date" class="form-control @error('masa_berlaku_lisensi') is-invalid @enderror" name="masa_berlaku_lisensi" min="1900" max="2099" step="1" value="{{ old('masa_berlaku_lisensi', $driver->masa_berlaku_lisensi) }}">
                                    @error('masa_berlaku_lisensi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="5" >
                                        {{ old('alamat', $driver->alamat) }}
                                    </textarea>
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
