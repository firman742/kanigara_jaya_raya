<?php

namespace App\Http\Controllers;

use App\Models\RentalTransaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRentalTransactionRequest;
use App\Http\Requests\UpdateRentalTransactionRequest;
use App\Models\Component;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class RentalTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentalTransactions = RentalTransaction::all();
        $admin = Auth::user();

        return view('Dashboard.Rental.index', compact(['admin', 'rentalTransactions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function praRental()
    {
        $admin = Auth::user();
        $components = Component::all();
        $customers = Customer::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();

        return view('Dashboard.Rental.pra-rental', compact(['admin', 'components', 'customers', 'drivers', 'vehicles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentalTransactionRequest $request)
    {
        // Menyimpan data transaksi rental
        $rentalTransaction = RentalTransaction::create([
            'pelanggan_id' => $request->pelanggan_id,
            'pengemudi_id' => $request->pengemudi_id,
            'kendaraan_id' => $request->vehicle_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'mulai_km' => $request->mulai_km,
            'bahan_bakar_masuk' => $request->bahan_bakar_masuk,
            'tanggal_kembali' => $request->tanggal_kembali,
            'tanggal_rencana_kembali' => $request->tanggal_rencana_kembali,
            'akhir_km' => $request->akhir_km,
            'bahan_bakar_habis' => $request->bahan_bakar_habis,
            'note' => $request->note,
            'out_demage_note' => $request->out_demage_note,
            'back_demage_note' => $request->back_demage_note,
        ]);

        // Mobil belum kembali
        if (is_null($request->tanggal_kembali)) {
            $rentalTransaction->status_rental = 0;
        }

        // Menyimpan foto kerusakan
        if ($request->hasFile('out_foto_depan')) {
            $path = $request->file('out_foto_depan')->store('uploads/out_foto_depan', 'public');
            $rentalTransaction->out_foto_depan = $path;
        }

        if ($request->hasFile('out_foto_belakang')) {
            $path = $request->file('out_foto_belakang')->store('uploads/out_foto_belakang', 'public');
            $rentalTransaction->out_foto_belakang = $path;
        }

        if ($request->hasFile('out_foto_kanan')) {
            $path = $request->file('out_foto_kanan')->store('uploads/out_foto_kanan', 'public');
            $rentalTransaction->out_foto_kanan = $path;
        }

        if ($request->hasFile('out_foto_kiri')) {
            $path = $request->file('out_foto_kiri')->store('uploads/out_foto_kiri', 'public');
            $rentalTransaction->out_foto_kiri = $path;
        }

        if ($request->hasFile('back_foto_depan')) {
            $path = $request->file('back_foto_depan')->store('uploads/back_foto_depan', 'public');
            $rentalTransaction->back_foto_depan = $path;
        }

        if ($request->hasFile('back_foto_belakang')) {
            $path = $request->file('back_foto_belakang')->store('uploads/back_foto_belakang', 'public');
            $rentalTransaction->back_foto_belakang = $path;
        }

        if ($request->hasFile('back_foto_kanan')) {
            $path = $request->file('back_foto_kanan')->store('uploads/back_foto_kanan', 'public');
            $rentalTransaction->back_foto_kanan = $path;
        }

        if ($request->hasFile('back_foto_kiri')) {
            $path = $request->file('back_foto_kiri')->store('uploads/back_foto_kiri', 'public');
            $rentalTransaction->back_foto_kiri = $path;
        }



        // Simpan perubahan pada model
        $rentalTransaction->save();


        // Redirect dengan pesan sukses
        return redirect()->route('rental.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pascaRental(RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalTransactionRequest $request, RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentalTransaction $rentalTransaction)
    {
        // TODO: Delete Masih gagal
        try {
            $rentalTransaction->delete();
            return redirect()->route('rental.index')
                ->with('success', 'Data Rental berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rental.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
