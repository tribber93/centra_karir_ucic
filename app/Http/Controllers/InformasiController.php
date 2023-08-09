<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Informasi::latest()->get();
        // dd($infos->konten); // Ambil semua data berita dari model
        return view('admin.kelola_informasi', compact('infos'));
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
        $file_nm = $request->gambarInformasi->getClientOriginalName();
        $image = $request->gambarInformasi->move('thumbnail', $file_nm);

        $penulis = Auth::user()->name;
        $judul = $request->judul;
        $jenis_informasi = $request->jenis_informasi;
        $kategori = $request->kategori;
        $konten = $request->konten;
        $gambar = $image;

        $simpan = Informasi::create([
            'penulis' => $penulis,
            'judul' => $judul,
            'jenis_informasi' => $jenis_informasi,
            'kategori' => $kategori,
            'konten' => $konten,
            'gambar' => $gambar
        ]);

        $simpan->save();

        return redirect()->back()->with('success', 'Informasi berhasil ditambahkan');
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
        $informasi = Informasi::find($id);
        return view('admin.edit_informasi', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $informasi = Informasi::find($id);
        $informasi->judul = $request->judul;
        $informasi->jenis_informasi = $request->jenis_informasi;
        $informasi->kategori = $request->kategori;
        $informasi->konten = $request->konten;
        // $informasi->gambar='';
        if ($request->gambarInformasi == null) {
            $informasi->gambar = $informasi->gambar;
        } else {
            $file_nm = $request->gambarInformasi->getClientOriginalName();
            $image = $request->gambarInformasi->move('thumbnail', $file_nm);
            $informasi->gambar = $image;
        }
        $informasi->save();

        return redirect()->back()->with('success', 'Informasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();

        return redirect()->back()->with('success', 'Informasi berhasil dihapus');
    }
}
