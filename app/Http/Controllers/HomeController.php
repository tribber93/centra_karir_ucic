<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Testimoni;
use App\Models\Alumni;
use App\Models\Questions;
use Illuminate\Http\Request;

class  HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //data alumni
        $kata_alumni = Testimoni::with('alumni')->get();
        //data berita
        $berita = Berita::take(3)->get();

        //data partner
        //data alamat Kampuss
        // dd($kata_alumni);
        return view('home', compact('berita', 'kata_alumni'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $berita = new Berita();
        $berita->create([
            'judul' => 'Halopek Indah',
            'deskripsi' => 'Profesi yang satu ini paling banyak digeluti oleh teman-teman lulusan IT. Web developer itu tugasnya menciptakan aplikasi berbasis web dengan menggunakan bahasa pemrograman. Pada dasarnya, web developer membuat berbagai hal “terjadi” pada sebuah website. Peran web developer adalah sebagai penghubung dari semua sumber daya yang akan digunakan pada sebuah website, mulai dari pemanggilan database, membuat halaman website yang dinamis, hingga mengatur cara pengunjung untuk berinteraksi dengan elemen-elemen dari website tersebut.',
            'status' => 'published',
            'kategori_id' => '2',
            'banner' => 'Programmer.jpg',
            'penulis' => 'Hatta, M. kom'
        ]);
    }
    public function createTestimoni()
    {
        //
        $berita = new Testimoni();
        $berita->create([
            'alumni_id' => '4',
            'kutipan_alumni' => 'Atmosfer akademik yang inspiratif di universitas ini telah mempengaruhi perkembangan pribadi dan profesional saya. Melalui program studi yang dirancang dengan baik dan dukungan dari fakultas yang berdedikasi, saya merasa didorong untuk mencapai potensi penuh saya. Universitas ini tidak hanya memberikan pengetahuan, tetapi juga membentuk saya menjadi seorang yang kritis, kreatif, dan siap menghadapi tantangan dalam karir saya. Saya bangga menjadi bagian dari keluarga alumni yang sukses dari universitas ini.',

        ]);
    }
    public function tracer()
    {
        // $question = 'Apa warna favorit Anda?';
        // $options = ['Merah', 'Biru', 'Kuning', 'Hijau'];

        // $namaModel = new Questions();
        // $namaModel->pertanyaan = $question;
        // $namaModel->opsi = json_encode($options);
        // $namaModel->save();
        $data_q = Questions::all();

        // dd($data_q);
        return view('coba', compact('data_q'));
        // return response()->json($data_q);
    }
    public function question(Request $request)
    {
        // $question = 'Apa warna favorit Anda?';
        // $options = ['Merah', 'Biru', 'Kuning', 'Hijau'];

        // $namaModel = new Questions();
        // $namaModel->pertanyaan = $question;
        // $namaModel->opsi = json_encode($options);
        // $namaModel->save();

        // $data_q = Questions::all();

        // dd($data_q);
        // return view('coba', compact('data_q'));
        // return response()->json($data_q);

        $index = $request->input('index');
        $pertanyaan = Questions::find($index);

        // Jika pertanyaan tidak ditemukan, kembalikan respon kosong
        if (!$pertanyaan) {
            return response()->json(null);
        }

        return response()->json($pertanyaan);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
