<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\HasilTracer;
use App\Models\Questions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dashboard_admin');
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
    public function kelolaBerita()
    {
        //
        return view('admin.kelola_berita');
    }
    public function kelolaAlumni()
    {
        $alumni = Alumni::all();
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
            $pertanyaan = $questionData['question'];

            // Check if the 'options' key exists in the $questionData array
            if (array_key_exists('options', $questionData)) {
                $optionsList = $questionData['options'];
            } else {
                // If 'options' key is not present or undefined, set it as an empty array
                $optionsList = [];
            }

            // Handle the case where the optionsList is an empty array
            if (empty($optionsList)) {
                // Convert an empty array to the string "[]"
                $optionsString = "[]";
            } else {
                // Convert the array to a JSON-encoded string
                $optionsString = json_encode($optionsList);
            }

            // Simpan data ke database untuk setiap pertanyaan
            $tracer = new Questions();
            $tracer->pertanyaan = $pertanyaan;
            $tracer->opsi = $optionsString;
            $tracer->status = 'none';
            $tracer->save();
        }

        return response()->json(['status' => 'success']);
    }
    public function deleteTracerQuestion($id)
    {
        try {
            // Find the question by ID
            $question = Questions::findOrFail($id);

            // Delete the question
            $question->delete();

            // Return a success response
            return response()->json(['message' => 'Question deleted successfully'], 200);
        } catch (\Exception $e) {
            // If an error occurs during deletion, return an error response
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
        $tracer = HasilTracer::with('alumni')->get();
        // $tracerr = HasilTracer::with('alumni')->find(73);
        // $pertanyaan  = Questions::where('status', 'publish')->find(73);
        $pertanyaan  = Questions::where('status', 'publish')->get()->reverse();
        $c = ['sa', 'su', 'se', 'se', 'so'];
        // foreach ($tracer as $hasilTracer) {
        //     // Access the 'alumni' relation on the current $hasilTracer model
        //     $alumni = $hasilTracer->alumni;
        // $dataPertanyaan=   HasilTracer::get();

        //         $kolom = [];

        // Iterasi data pertanyaan
        // foreach ($tracer as $data) {
        //     // Ambil nama pertanyaan
        //     $pertanyaan = $data['pertanyaan'];

        //     // Tambahkan kolom baru ke dalam array
        //     $kolom[] = [
        //         'data' => $pertanyaan, // Nama kolom sesuai pertanyaan
        //         'title' => $pertanyaan, // Judul kolom di tabel
        //     ];
        // }

        //         // Gunakan $kolom dalam pembuatan tabel, misalnya menggunakan plugin DataTables
        //         // Contoh menggunakan DataTables
        //         // return datatables()->of($data)
        //         //     ->addColumn($kolom) // Tambahkan kolom dinamis berdasarkan pertanyaan
        // //         //     ->toJson();
        // $hasilTracer = HasilTracer::find(72);
        // dd($hasilTracer->getOriginal());
        //     // Now you can access the attributes of the 'alumni' model
        //     // For example, if 'alumni' has a 'name' attribute, you can access it like this:
        //     $alumniName = $alumni->nama_alumni;
        //     dd($alumniName);
        // }
        // dd(count($tracer));


        return view("admin.hasil_tracer", compact('tracer', 'pertanyaan', 'c'));
    }
    public function getQuestionById(Request $request)
    {
        // Get the ID of the question from the request
        $questionId = $request->input('id');

        // Fetch the question data from the database by ID
        $question = Questions::find($questionId);

        if (!$question) {
            // If the question is not found, return an error response
            return response()->json(['status' => 'error', 'message' => 'Question not found'], 404);
        }

        // Convert the question data to an array and return it in the response
        return response()->json(['status' => 'success', 'data' => $question->toArray()]);
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
