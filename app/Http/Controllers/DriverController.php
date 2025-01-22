<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        $admin = Auth::user();

        return view('Dashboard.Drivers.index', compact(['drivers', 'admin']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user();

        return view('Dashboard.Drivers.create', compact(['admin']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request)
    {
        $validated = $request->validated();

        try {
            Driver::create($validated);
            return redirect()->route('pengemudi.index')
                ->with('success', 'Data pengemudi berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('pengemudi.create')
                ->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        $admin = Auth::user();

        return view('Dashboard.Drivers.edit', compact(['driver', 'admin']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $validatedData = $request->validated();

        try {
            $driver->update($validatedData);
            return redirect()->route('pengemudi.index')
                ->with('success', 'Data pengemudi berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('pengemudi.edit', $driver->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        try {
            $driver->delete();
            return redirect()->route('pengemudi.index')
                ->with('success', 'Data pengemudi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pengemudi.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
