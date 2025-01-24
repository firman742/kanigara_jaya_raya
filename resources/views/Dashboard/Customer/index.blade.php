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
                            <a href="{{ route('pelanggan.create') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-plus-square"></i> Tambah Pelanggan</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Pelanggan</h5>
                            {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Asal perusahaan</th>
                                        <th>Alamat</th>
                                        <th>No telepon</th>
                                        <th>Validasi KTP</th>
                                        <th data-type="date" data-format="DD/MM/YYYY">Tanggal Validasi KTP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $customer->nama_pelanggan }}</td>
                                            <td>{{ $customer->perusahaan }}</td>
                                            <td>{{ $customer->alamat }}</td>
                                            <td>{{ $customer->nomor_telepon }}</td>
                                            <td>
                                                @if ($customer->validasi_ktp === 1)
                                                    <span class="badge bg-primary">Valid</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Valid</span>
                                                @endif
                                            </td>
                                            <td>{{ $customer->tanggal_validasi_ktp }}</td>
                                            <td>
                                                <a href="{{ route('pelanggan.edit', $customer->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <br>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $customer->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="deleteModal{{ $customer->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $customer->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data <strong>{{ $customer->nama_pelanggan }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('pelanggan.destroy', $customer->id) }}" method="POST">
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
