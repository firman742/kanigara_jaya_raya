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
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    {{-- Tombol Create --}}
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('mobil.create') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-plus-square"></i> Tambah Mobil</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Mobil</h5>
                            {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Seri</th>
                                        <th>Jenis</th>
                                        <th>Plat Nomor</th>
                                        <th>Warna</th>
                                        <th data-type="date" data-format="YYYY">Tahun</th>
                                        <th>Nomor Mesin</th>
                                        <th>Nomor Sasis</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Waktu Masuk</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Waktu Diperbarui</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $vehicle->seri }}</td>
                                            <td>{{ $vehicle->jenis }}</td>
                                            <td>{{ $vehicle->plat_nomor }}</td>
                                            <td>{{ $vehicle->warna }}</td>
                                            <td>{{ $vehicle->tahun }}</td>
                                            <td>{{ $vehicle->nomor_mesin }}</td>
                                            <td>{{ $vehicle->nomor_sasis }}</td>
                                            <td>{{ $vehicle->created_at }}</td>
                                            <td>{{ $vehicle->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('mobil.edit', $vehicle->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <br>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $vehicle->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="deleteModal{{ $vehicle->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $vehicle->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data <strong>{{ $vehicle->seri }} - {{ $vehicle->jenis }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('mobil.destroy', $vehicle->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
