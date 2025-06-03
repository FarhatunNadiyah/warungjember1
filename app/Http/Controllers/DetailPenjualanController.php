<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_penjualans = DetailPenjualan::all();
    return view('detail_penjualan.index', compact('detail_penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penjualans = \App\Models\Penjualan::all();
        $barangs = \App\Models\Barang::all();
        return view('detail_penjualan.create', compact('penjualans', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        DetailPenjualan::create($request->all());
        return redirect()->route('detail-penjualan.index')->with('success', 'Detail penjualan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail_penjualan = DetailPenjualan::findOrFail($id);
        return view('detail_penjualan.edit', compact('detail_penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penjualan_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $detail_penjualan = DetailPenjualan::findOrFail($id);
        $detail_penjualan->update($request->all());

        return redirect()->route('detail-penjualan.index')->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_penjualan = DetailPenjualan::findOrFail($id);
    $detail_penjualan->delete();

    return redirect()->route('detail-penjualan.index')->with('success', 'Detail penjualan berhasil dihapus.');
    }
}
