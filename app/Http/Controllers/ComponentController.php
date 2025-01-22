<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();
        $components = Component::all();

        return view('Dashboard.Component.index', compact(['admin', 'components']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user();

        return view('Dashboard.Component.create', compact(['admin']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComponentRequest $request)
    {
        $validated = $request->validated();

        try {
            Component::create($validated);
            return redirect()->route('komponen.index')
                ->with('success', 'Data komponen berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('komponen.create')
                ->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Component $component)
    {
        $admin = Auth::user();

        return view('Dashboard.Component.edit', compact(['component', 'admin']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComponentRequest $request, Component $component)
    {
        $validatedData = $request->validated();

        try {
            $component->update($validatedData);
            return redirect()->route('komponen.index')
                ->with('success', 'Data komponen berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('komponen.edit', $component->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        try {
            $component->delete();
            return redirect()->route('komponen.index')
                ->with('success', 'Data komponen berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('komponen.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
