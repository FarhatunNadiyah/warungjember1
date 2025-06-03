<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\Int_;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $pembelis = Pembeli::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%");
    })->get();

    return view('pembeli.index', compact('pembelis', 'search'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
{
    $request->validate([
        'nama' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'alamat' => 'required',
        'no_hp' => 'required',
    ]);

    Pembeli::create([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil ditambahkan!');
}

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
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);



        $pembeli = Pembeli::findOrFail($id);
        $pembeli->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
{
    $pembeli->delete();
    return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil dihapus');
}

}
