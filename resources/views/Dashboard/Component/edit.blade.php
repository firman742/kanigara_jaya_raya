@extends('layouts.layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manajemen Komponen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Komponen</li>
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
                            <a href="{{ route('komponen.index') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-arrow-left-square"></i> kembali</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Komponen</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('komponen.update', $component->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="nama_komponen" class="form-label">Nama Komponen</label>
                                    <input type="text" class="form-control @error('nama_komponen') is-invalid @enderror" name="nama_komponen" value="{{ old('nama_komponen', $component->nama_komponen) }}">
                                    @error('nama_komponen')
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
