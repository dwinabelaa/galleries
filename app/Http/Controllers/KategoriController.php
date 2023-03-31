<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Kategori::all();

        return view('kategori', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create([
            'nama' => $request->name,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // bisa menggunakan compact seperti ini bisa juga langsung ditambahkan parameter kedua 
        // $kategori = Kategori::findOrFail($id);
        // return view('detail_kategori', compact('kategori'));

        return view('detail_kategori', [
            'kategori' => Kategori::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $kategori = Kategori::findOrFail($id);
        // return view('edit_kategori', compact('kategori'));

        return view('edit_kategori', [
            'kategori' => Kategori::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kategori::findOrFail($id)->update([
            'namaa' => $request->nama
        ]);

        return redirect()->route('kategori.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
