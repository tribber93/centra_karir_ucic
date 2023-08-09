<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Testimoni;
use App\Models\Alumni;
use App\Models\Informasi;
use App\Models\HasilTracer;
use App\Models\Questions;
use Illuminate\Http\Request;

class  HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function admin()
    {

        return view('admin.dashboard_admin');
    }
    public function index()
    {
        // //data alumni
        $kata_alumni = Testimoni::with('alumni')->get();
        //data berita
        $informasi = Informasi::take(3)->get();
        // foreach ($informasi as $info) {
        //     dd($info->konten);
        // }


        // data partner
        // data alamat Kampuss
        // dd($kata_alumni);
        return view('homepage.home', compact('informasi', 'kata_alumni'));
    }
    public function portal()
    {
        $semua_informasi = Informasi::all();

        return view('informasi.portal', compact('semua_informasi'));
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
    public function quesionarTerisi()
    {
        $hasilTracers = HasilTracer::all();

        foreach ($hasilTracers as $hasilTracer) {
            $question = $hasilTracer->question;
            $jawaban = $hasilTracer->jawaban;

            echo "Pertanyaan: {$question->pertanyaan} ==> : { $jawaban} \n";
            // ... and other properties of the Questions model
        }
    }
    public function tracer()
    {
        // $question = 'DISKUSI';
        // $options = ['SANGAT BESAR',
        // 'BESAR',
        // 'CUKUP BESAR',
        // 'KURANG',
        // 'TIDAK SAMA SEKALI'];
        $question = 'BERAPA BANYAK PERUSAHAAN/INSTANSI/INSTITUSI YANG MERESPON LAMARAN ANDA ?';
        $options = [];
        $status = 'publish';

        $namaModel = new Questions();
        $namaModel->pertanyaan = $question;
        $namaModel->status = $status;
        $namaModel->opsi = json_encode($options);
        $namaModel->save();
        // $data_q = Questions::all();

        // dd($data_q);
        // return view('coba', compact('data_q'));
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
    public function simpanJawaban(Request $request)
    {
        $selectedAnswers = json_decode($request->input('selectedAnswers'), true);


        foreach ($selectedAnswers as $answer) {
            $pertanyaan_id = $answer['pertanyaan_id'];
            $jawaban = $answer['answer'];

            HasilTracer::create([
                'tracer_id' => $pertanyaan_id,
                'jawaban' => $jawaban,
            ]);
        }

        // Respon sukses jika data berhasil disimpan
        return response()->json(['message' => 'Data jawaban berhasil disimpan'], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $informasi = Informasi::find($id);
        $kategori = Informasi::all();
        $lowongan = Informasi::where('jenis_informasi', 'lowongan')->get();
        $berita = Informasi::where('jenis_informasi', 'berita')->get();
        // dd($lowongan);
        return view('informasi.detail', compact('informasi', 'kategori', 'lowongan', 'berita'));
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
