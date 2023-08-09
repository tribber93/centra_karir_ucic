<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\HasilTracer;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Informasi;
use App\Models\Diskusi;
use App\Models\User;
use PHPUnit\Event\Tracer\Tracer;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $informasi = Informasi::orderBy('created_at', 'desc')->first();
        $berita = $informasi::where('jenis_informasi', 'berita')->take(5)->get();
        $lowongan = $informasi::where('jenis_informasi', 'lowongan')->take(5)->get();
        $diskusi = Diskusi::with('user')->take(5)->get();
        // $alumni = Alumni::where('user_id', Auth::user()->id)->get();
        // dd($alumni);


        return view('alumni.dashboard_alumni', compact('berita', 'lowongan', 'diskusi'));
    }
    public function tracer_study()
    {
        $user_auth = Auth::user()->id;
        $alumni = Alumni::where('user_id', $user_auth)->first();
        // dd($alumni);
        // tracing
        $tracer = Questions::where('status', 'publish')
            ->get();
        // $tracer = $trace->sortBy(function ($item) {
        //     return $item->nama_perusahaan ? 0 : 1;
        // });
        // $jsonPertanyaan = json_encode($tracer);
        // $dataArray = json_decode($jsonPertanyaan, true);
        // dd($tracer);

        // status tracer 0 dan 1 ye:)
        $status_tracer = $alumni->status_tracer;
        $tanggal_tracer = $alumni->updated_at;

        return view('alumni.tracer_study', compact('alumni', 'tracer', 'status_tracer', 'tanggal_tracer'));
    }

    public function forum()
    {
        //
        return view('alumni.forum_diskusi');
    }
    public function simpan_tracer(Request $request)
    {
        // Lakukan validasi data jika diperlukan
        // $request->validate([...]);

        // Ambil data dari request
        $formData = $request->all();
        $alumni = Alumni::where('user_id', Auth::user()->id)->first();
        // $no_telp = Alumni::where('user_id', Auth::user()->id)->get('no_telpon');
        // dd($alumni);

        $alumni->status_kerja = $request->isChecked;
        $alumni->nama_perusahaan = $request->namaPerusahaan;
        $alumni->posisi = $request->posisi;
        $alumni->mulai_bekerja = $request->mulaiBekerja;
        $alumni->status_tracer = 1;
        $alumni->total_tracer += 1;
        // $alumni->no_telpon = $request->noTelp;
        if ($alumni->no_telpon == $request->noTelp) {
            $alumni->no_telpon = $alumni->no_telpon;
        } else {
            $alumni->no_telpon = $request->noTelp;
            # code...
        }

        // Simpan data ke tabel yang diinginkan
        // Misalnya, jika Anda menggunakan Eloquent ORM pada Laravel:
        // YourModel::create($formData);

        $alumni->save();

        // Jika berhasil disimpan, kembalikan respons ke klien (misalnya, status berhasil)
        return response()->json(['status' => 'success'],);
    }
    public function simpan(Request $request)
    {
        // Lakukan validasi data jika diperlukan
        // $request->validate([...]);

        // Ambil data dari request
        // $formData = $request->all();
        $alumni = Alumni::where('user_id', Auth::user()->id)->first();

        $hasilTracer = new HasilTracer;
        $jsonData = $request->json()->all();

        $hasilTracer->jawaban = $jsonData;
        $hasilTracer->alumni_id = $alumni->id;

        $hasilTracer->save();

        return response()->json(['status' => 'success'],);
    }
    public function getPertanyaan()
    {
        //


        return view('alumni.forum_diskusi');
    }
    public function getPertanyaanById(Request $request)
    {
        //


        $id = $request->query('id');

        // Fetch 'pertanyaan' from the 'quiesioner' table based on the 'id'
        $quiesionerData = Questions::where('id', $id)->first();

        // Return the 'pertanyaan' data as JSON response
        return response()->json(['pertanyaan' => $quiesionerData->pertanyaan]);
    }

    public function profil()
    {
        $user_auth = Auth::user()->id;
        $alumni = Alumni::where('user_id', $user_auth)->first();

        return view('alumni.profil', compact('alumni'));
    }
    public function updateProfil(Request $request)
    {
        $user_auth = Auth::user()->id;
        $alumni = Alumni::where('user_id', $user_auth)->first();
        $alumni->no_telpon = $request->noTelp;
        $alumni->testimoni = $request->testimoniAlumni;
        if ($request->fotoProfil == null) {
            $alumni->image = $alumni->image;
        } else {
            $file_nm = $request->fotoProfil->getClientOriginalName();
            $image = $request->fotoProfil->move('thumbnail', $file_nm);
            $alumni->image = $image;
        }
        $alumni->save();

        return redirect()->back()->with('success', 'Informasi berhasil diubah');
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
