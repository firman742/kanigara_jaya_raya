<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $admin = Auth::user();

        return view('Dashboard.Vehicles.index', compact(['vehicles', 'admin']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user();

        return view('Dashboard.Vehicles.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'plat_nomor' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'seri' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:255',
            'nomor_mesin' => 'required|string|max:255',
            'nomor_sasis' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi data gagal. Silakan periksa kembali data Anda.');
        }

        Vehicle::create($request->all());

        return redirect()->route('mobil.index')
            ->with('success', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $admin = Auth::user();

        return view('Dashboard.Vehicles.edit', compact(['admin', 'vehicle']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $validatedData = $request->validated();

        try {
            $vehicle->update($validatedData);
            return redirect()->route('mobil.index')
                ->with('success', 'Data mobil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('mobil.edit', $vehicle->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        try {
            $vehicle->delete();
            return redirect()->route('mobil.index')
                ->with('success', 'Data mobil berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('mobil.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
