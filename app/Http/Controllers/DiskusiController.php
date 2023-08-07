<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\DiskusiKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    //
    public function index(){
        $diskusi = Diskusi::with('user')->get();
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


      $diskusi->judul =$judul;
$diskusi->isi = $isi;
$diskusi->user_id = Auth::user()->id;
$diskusi->save();



return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan ke tabel.']);
    }

    public function komentar($id){
        $diskusi = Diskusi::with('user')->find($id);
        // dd($diskusi);
        $dk = DiskusiKomentar::with('user')->where('diskusi_id', $id)
        ->get();
        $dkC = DiskusiKomentar::with('user')->where('diskusi_id', $id)
        ->count();


        //  ->orderByDesc('created_at')
    return view('diskusi.detail_diskusi', compact('diskusi', 'dk', 'dkC'));
    }
    public function postKomentarById(Request $request, $id){

        $data = $request->input('data'); // Mengambil data dari AJAX yang dikirimkan dengan key 'data'
        $dk  = new DiskusiKomentar();

        // Misalnya, jika Anda ingin menyimpan data ke database:
        $idDiskusi = $data['diskusiId'];
        $isi = $data['isi'];


        $dk->diskusi_id = $idDiskusi;
        $dk->user_id = Auth::user()->id;
        $dk->isi = $isi;
        $dk->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan ke tabel.']);

    // return view('diskusi.detail_diskusi', compact('diskusi'));
    }


}
