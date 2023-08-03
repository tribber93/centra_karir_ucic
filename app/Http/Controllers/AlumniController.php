<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\HasilTracer;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Event\Tracer\Tracer;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        return view('alumni.dashboard_alumni');
    }
    public function tracer_study()
    {
        $user_auth = Auth::user()->id;
        $alumni = Alumni::find($user_auth);
        // dd($alumni);
        // tracing
        $tracer = Questions::where('status','publish')->get();
        // $jsonPertanyaan = json_encode($tracer);
        // $dataArray = json_decode($jsonPertanyaan, true);
        // dd($dataArray);

        // status tracer 0 dan 1 ye:)
        $status_tracer = $alumni->status_tracer;
        $tanggal_tracer = $alumni->updated_at;

        return view('alumni.tracer_study', compact('alumni','tracer', 'status_tracer', 'tanggal_tracer'));
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
        $alumni->no_telpon = $request->noTelp;
    //   if ($alumni->no_telpon == $request->noTelp) {
    //     $alumni->no_telpon = $alumni->no_telpon;
    //   } else {

        # code...
    //   }

        // Simpan data ke tabel yang diinginkan
        // Misalnya, jika Anda menggunakan Eloquent ORM pada Laravel:
        // YourModel::create($formData);

        $alumni->save();

        // Jika berhasil disimpan, kembalikan respons ke klien (misalnya, status berhasil)
        return response()->json(['status' => 'success'], );
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

        return response()->json(['status' => 'success'], );
    }
    public function getPertanyaan()
    {
        //


        return view('alumni.forum_diskusi');

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
