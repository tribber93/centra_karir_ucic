<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Diskusi;
use App\Models\DiskusiKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    //
    public function getDiscussion($id)
    {
        $discussion = Diskusi::find($id);
        // dd($discussion);
        return response()->json([
            'status' => 'success',
            'data' => $discussion
        ]);
    }
    public function editDiscussion(Request $request, $id)
    {
        $discussion = Diskusi::find($id);

        $discussion->judul = $request->input('judul');
        $discussion->isi = $request->input('isi');
        $discussion->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data diskusi berhasil diubah'
        ]);
    }

    public function deleteDiscussion($id)
    {
        $discussion = Diskusi::find($id);
        $komentarParent = DiskusiKomentar::where('diskusi_id', $id)->get();
        foreach($komentarParent as $a){
            $a->delete();

        }
        if (!$discussion) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data diskusi tidak ditemukan'
            ], 404);
        }

        $discussion->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data diskusi berhasil dihapus'
        ]);
    }
    public function index()
    {
        $diskusi = Diskusi::latest()->with('user')->get();
        $jumlahKomentarPerDiskusi = [];

        foreach ($diskusi as $d) {
            $jumlahKomentar = DiskusiKomentar::where('diskusi_id', $d->id)->count();
            $jumlahKomentarPerDiskusi[$d->id] = $jumlahKomentar;
        }
        // dd($jumlahKomentar);
        return view('alumni.forum_diskusi', compact('diskusi', 'jumlahKomentarPerDiskusi'));
    }

    public function postDiskusi(Request $request)
    {
        $diskusi = new Diskusi();

        $data = $request->input('data');

        $judul = $data['judul'];
        $isi = $data['isi'];

        $diskusi->judul = $judul;
        $diskusi->isi = $isi;
        if (Auth::user()->role != 'admin') {
            $alumni = Alumni::where('user_id', Auth::user()->id)->firstOrfail();
            $diskusi->alumni_id = $alumni->id;
        }
        $diskusi->user_id = Auth::user()->id;
        $diskusi->save();



        return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan ke tabel.']);
    }

    public function komentar($id)
    {
        $diskusi = Diskusi::with('user')->find($id);
        // dd($diskusi);
        $dk = DiskusiKomentar::with('user', 'alumni')->where('diskusi_id', $id)
            ->get();
        $dkC = DiskusiKomentar::with('user')->where('diskusi_id', $id)
            ->count();


        $auth = Auth::user()->name;


        //  ->orderByDesc('created_at')
        return view('diskusi.detail_diskusi', compact('diskusi', 'dk', 'dkC', 'auth'));
    }
    public function postKomentarById(Request $request, $id)
    {

        $data = $request->input('data');
        $dk  = new DiskusiKomentar();

        $idDiskusi = $data['diskusiId'];
        $isi = $data['isi'];


        $dk->diskusi_id = $idDiskusi;
        $dk->user_id = Auth::user()->id;
        $dk->isi = $isi;
        if (Auth::user()->role != 'admin') {
            $alumni = Alumni::where('user_id', Auth::user()->id)->firstOrfail();
            $dk->alumni_id = $alumni->id;
        }
        $dk->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan ke tabel.']);

    }
    public function editKomentar(Request $request, $id)
    {

        $data = $request->input('isi');
        $dk  =  DiskusiKomentar::find($id);
        // dd($dk);
        $dk->isi = $data;

        // dd($data);
        $dk->save();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan ke tabel.']);

        // return view('diskusi.detail_diskusi', compact('diskusi'));
    }
    public function deleteKomentar($id)
    {

        $dk  =  DiskusiKomentar::find($id);
        $dk->delete();

        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus broo.']);
    }
    public function updateStatusTestimoni(Request $request, $id)
    {

        $dk  =  Alumni::find($id);
        // dd($id);
        $status = $request->input('status');
        $dk->status_testimoni = $status;

        $dk->save();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil masuk broo.']);
    }
}
