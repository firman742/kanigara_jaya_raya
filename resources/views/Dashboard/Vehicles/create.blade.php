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


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    {{-- Tombol Create --}}
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('mobil.index') }}" class="btn btn-success mt-3 rounded rounded-4"><i class="bi bi-arrow-left-square"></i> kembali</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Mobil</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('mobil.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="seri" class="form-label">Seri</label>
                                    <input type="text" class="form-control" id="seri">
                                </div>
                                <div class="col-md-12">
                                    <label for="jenis" class="form-label">jenis</label>
                                    <input type="text" class="form-control" id="jenis">
                                </div>
                                <div class="col-md-12">
                                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                    <input type="text" class="form-control" id="plat_nomor">
                                </div>
                                <div class="col-12">
                                    <label for="warna" class="form-label">Warna</label>
                                    <input type="text" class="form-control" id="warna">
                                </div>
                                <div class="col-12">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" class="form-control" min="1900" max="2099" step="1"
                                        id="tahun">
                                </div>
                                <div class="col-12">
                                    <label for="nomor_mesin" class="form-label">Nomor Mesin</label>
                                    <input type="text" class="form-control" id="nomor_mesin">
                                </div>
                                <div class="col-12">
                                    <label for="nomor_sasis" class="form-label">Nomor Sasis</label>
                                    <input type="text" class="form-control" id="nomor_sasis">
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
