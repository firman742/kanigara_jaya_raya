@extends('layouts.layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manajemen Rental</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Rental</li>
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
                            <a href="{{ route('rental.pra-rental') }}" class="btn btn-success mt-3 rounded rounded-4"><i
                                    class="bi bi-plus-square"></i> Tambah Pra-rental</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Transaksi Rental</h5>
                            {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggan</th>
                                        <th>Pengemudi</th>
                                        <th>Kendaraan</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Tanggal Rencana kembali</th>
                                        <th>Tanggal Kembali</th>
                                        <th>status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($rentalTransactions as $transaction)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $transaction->customer->nama_pelanggan }}</td>
                                            <td>{{ $transaction->driver->nama_pengemudi }}</td>
                                            <td>{{ $transaction->vehicle->seri }}</td>
                                            <td>{{ $transaction->tanggal_mulai }}</td>
                                            <td>{{ $transaction->tanggal_rencana_kembali }}</td>
                                            <td class="text-center">{{ $transaction->tanggal_kembali ?? '-' }}</td>
                                            <td>
                                                {{-- true untuk mobil yang belum kembali --}}
                                                @if ($transaction->status_rental === 0)
                                                    <span class="badge bg-danger">Belum kembali</span>
                                                @else
                                                    <span class="badge bg-primary">Telah kembali</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('rental.show', $transaction->id) }}"
                                                    class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <br>
                                                <a href="{{ route('rental.pasca-rental', $transaction->id) }}"
                                                    class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembalikan Mobil">
                                                    <i class="bi bi-arrow-return-left"></i>
                                                </a>
                                                <br>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $transaction->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <div class="modal fade" id="deleteModal{{ $transaction->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $transaction->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data rental milik <strong>{{ $transaction->customer->nama_pelanggan }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('rental.destroy', $transaction->id) }}" method="POST">
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
