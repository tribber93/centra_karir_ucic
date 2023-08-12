<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Partner;
use App\Models\HasilTracer;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Exports\TracerExport;
use App\Exports\TracerExportHistori;
use App\Models\Histori;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
// ...
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracer = HasilTracer::count();
        $tracer_lama = Histori::count();
        $user = User::count();
        $h_user  = $user - 1;
        $prodi = Alumni::distinct('prodi')->pluck('prodi');
        $sudah_kerja = [];
        $belum_kerja = [];
        $alumni_perprodi = [];
        foreach ($prodi as $pd) {
            $jumlahAlumniperProdi = Alumni::where('prodi', $pd)->count();
            $alumniKerja = Alumni::where('prodi', $pd)->where('status_kerja', 'true')->count();
            $alumniBelumKerja = $jumlahAlumniperProdi - $alumniKerja;
            array_push($sudah_kerja, $alumniKerja);
            array_push($belum_kerja, $alumniBelumKerja);
            array_push($alumni_perprodi, $jumlahAlumniperProdi);
        }

        // dd($sudah_kerja);
        return view('admin.dashboard_admin', compact('tracer', 'tracer_lama', 'h_user', 'prodi', 'sudah_kerja', 'belum_kerja', 'alumni_perprodi'));
    }
    public function testimoni()
    {
        //
        $testimoni = Alumni::paginate(5);
        //    dd($h_user);
        return view('admin.testimoni_alumni', compact('testimoni'));
    }
    public function getDetailAlumni($id)
    {
        $testimoni = Alumni::find($id);

        return response()->json($testimoni);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function kelolaTracer()
    {
        //
        // $tracer = Questions::all();
        $tracer = Questions::all();

        // dd($tracer);
        return view('admin.kelola_tracer', compact('tracer'));
    }
    public function backupData()
    {
        $tracer = Histori::with('alumni')->paginate(2);
        $pertanyaan = Questions::where('status', 'publish')->get();

        // dd($tracer);
        return view('admin.backup_data', compact('tracer', 'pertanyaan'));
    }
    public function kelolaBerita()
    {
        //
        return view('admin.kelola_berita');
    }
    public function kelolaAlumni()
    {
        $alumni = Alumni::paginate(10);
        return view('admin.kelola_alumni', compact('alumni'));
    }
    public function tambahAlumni(Request $request)
    {
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = 'alumni';
        $user->password = bcrypt($request->nim);

        $user->save();

        $alumni = new Alumni();
        $alumni->user_id = $user->id;
        $alumni->nama_alumni = ucwords($request->nama);
        $alumni->nim = $request->nim;
        $alumni->angkatan = $request->angkatan;
        $alumni->jenjang = $request->jenjang;
        $alumni->prodi = $request->prodi;
        $alumni->tahun_lulus = $request->tahun_lulus;

        $alumni->save();

        return redirect()->back()->with('success', 'Informasi berhasil ditambahkan');
    }
    public function editAlumni($id)
    {
        $alumni = alumni::find($id);
        $user = User::find($alumni->user_id);

        return view('admin.edit_alumni', compact('alumni', 'user'));
    }
    public function updateAlumni(Request $request, $id)
    {
        $alumni = alumni::find($id);
        $user = User::find($alumni->user_id);

        $alumni->nama_alumni = ucwords($request->nama);
        $user->email = $request->email;
        $alumni->nim = $request->nim;
        $alumni->angkatan = $request->angkatan;
        $alumni->jenjang = $request->jenjang;
        $alumni->prodi = $request->prodi;
        $alumni->tahun_lulus = $request->tahun_lulus;

        $user->save();
        $alumni->save();

        return redirect()->back()->with('success', 'Informasi berhasil diubah');
    }
    public function deleteAlumni($id)
    {
        $alumni = Alumni::find($id);
        $user = User::find($alumni->user_id);
        $user->delete();
        $alumni->delete();

        return redirect()->back()->with('success', 'Informasi berhasil dihapus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpanTracer(Request $request)
    {
        $questionsData = $request->questionsData;

        foreach ($questionsData as $questionData) {
            $pertanyaan =ucwords( $questionData['question']);

            if (array_key_exists('options', $questionData)) {
                $optionsList = $questionData['options'];
            } else {
                $optionsList = [];
            }

            if (empty($optionsList)) {
                $optionsString = "[]";
            } else {
                $optionsString = json_encode($optionsList);
            }

            $tracer = new Questions();
            $tracer->pertanyaan = $pertanyaan;
            $tracer->opsi = ucwords($optionsString);
            $tracer->status = 'none';
            $tracer->save();
        }

        return response()->json(['status' => 'success']);
    }
    public function updateQuestionStatus(Request $request)
    {
        $questionId = $request->input('id');
        $newStatus = $request->input('status');
        // dd($request->all());

        try {
            $question = Questions::find($questionId);
            $question->status = $newStatus;
            $question->save();

            return response()->json(['message' => 'Question status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating question status'], 500);
        }
    }
    public function deleteTracerQuestion($id)
    {
        try {
            $question = Questions::findOrFail($id);
            $question->delete();

            return response()->json(['message' => 'Question deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete question'], 500);
        }
    }
    public function updateQuestion(Request $request)
    {


        $questionId = $request->input('id');
        $pertanyaan = $request->input('pertanyaan');
        $opsi = $request->input('opsi');
        $status = $request->input('status');

        $jsonStringFromDatabase = trim($opsi, '"');

        $phpArray = json_decode($jsonStringFromDatabase, true);
        $question = Questions::find($questionId);
        $question->pertanyaan = $pertanyaan;
        $question->opsi = $jsonStringFromDatabase;
        $question->status = $status;
        $question->update();
        // dd($jsonStringFromDatabase);

        // Return the updated question as a JSON response
        return response()->json(['pertanyaan' => $pertanyaan]);
    }

    /**
     * Display the specified resource.
     */
    public function showTracer()
    {
        //
        $tracer = HasilTracer::with('alumni')->paginate(5);
        $pertanyaan = Questions::where('status', 'publish')->get();
        return view("admin.hasil_tracer", compact('tracer', 'pertanyaan'));

    }
    public function getCount(Request $request)
    {

        if ($request->input('data') == "ok") {
            $currentDate = Carbon::now();
            $threeMonthsAgo = $currentDate->subMonths(3);
            // $tracer = HasilTracer::get();
            // 7 agustus
            $tracer = HasilTracer::whereDate('created_at', '<=', $threeMonthsAgo)->get();
            $backupCount = 0;
            foreach ($tracer as $i) {
                $backupCount++;
            }
            return response()->json(['status' => 'OK', 'data' => ['count' => $backupCount]]);
        }
    }
    public function backup(Request $request)
    {

        if ($request->input('data') == "ok") {
            $currentDate = Carbon::now();
            $threeMonthsAgo = $currentDate->subMonths(3);
            // $tracer = HasilTracer::get();
            // 7 agustus
            $tracer = HasilTracer::whereDate('created_at', '<=', $threeMonthsAgo)->get();
            $backupCount = 0;
            foreach ($tracer as $i) {
                Histori::create([
                    'alumni_id' => $i->alumni_id,
                    'jawaban' => $i->jawaban,
                    'created_at' => $i->created_at,
                    'updated_at' => $i->updated_at,
                    // Add other attributes to be inserted into the "histori" table if needed.
                ]);

                $backupCount++;
            }
            HasilTracer::whereDate('created_at', '<=', $threeMonthsAgo)->delete();
            return response()->json(['status' => 'OK', 'data' => ['count' => $backupCount]]);
        }
    }
    public function getQuestionById(Request $request)
    {
        $questionId = $request->input('id');
        $question = Questions::find($questionId);

        if (!$question) {
            return response()->json(['status' => 'error', 'message' => 'Question not found'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $question->toArray()]);
    }

    public function partner()
    {
        $partner = Partner::all();
        return view("admin.partner", compact('partner'));
    }
    public function tambahPartner(Request $request)
    {
        $file_nm = $request->logoPartner->getClientOriginalName();
        $image = $request->logoPartner->move('partner', $file_nm);

        $partner = new Partner();
        $partner->nama_partner = $request->namaPartner;
        $partner->logo_partner = $image;

        $partner->save();

        return redirect()->back()->with('success', 'Informasi berhasil ditambahkan');
    }
    public function editPartner(Request $request, $id)
    {
        $partner = Partner::find($id);
        $partner->nama_partner = $request->editNamaPartner;

        if ($request->editLogoPartner != null) {
            $file_nm = $request->editLogoPartner->getClientOriginalName();
            $image = $request->editLogoPartner->move('partner', $file_nm);
            $partner->logo_partner = $image;
        }

        $partner->save();

        return redirect()->back()->with('success', 'Informasi berhasil ditambahkan');
    }
    public function hapusPartner(string $id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect()->back()->with('success', 'partner berhasil dihapus');
    }
    public function export()
    {
        return Excel::download(new TracerExport, 'tracer.xlsx');
    }
    public function exportTracerHistori()
    {
        return Excel::download(new TracerExportHistori, 'tracerHistori.xlsx');
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
