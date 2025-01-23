<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();
        $customers = Customer::all();

        return view('Dashboard.Customer.index', compact(['admin', 'customers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user();

        return view('Dashboard.Customer.create', compact(['admin']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();

        if ($validated['validasi_ktp'] === '0') {
            $validated['validasi_ktp'] = true;
        }


        try {
            Customer::create($validated);
            return redirect()->route('pelanggan.index')
                ->with('success', 'Data pelanggan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.create')
                ->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $admin = Auth::user();

        return view('Dashboard.Customer.edit', compact(['customer', 'admin']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validatedData = $request->validated();

        try {
            $customer->update($validatedData);
            return redirect()->route('pelanggan.index')
                ->with('success', 'Data pelanggan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.edit', $customer->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->route('pelanggan.index')
                ->with('success', 'Data pelanggan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
