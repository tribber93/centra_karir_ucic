<?php

namespace App\Http\Controllers;

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
        $tracer = Questions::get();

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
        //
        return view('admin.kelola_alumni');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpanTracer(Request $request)
    {
        $questionsData = $request->questionsData;

        foreach ($questionsData as $questionData) {
            $pertanyaan = $questionData['question'];
            $optionsList = $questionData['options'];

            // Simpan data ke database untuk setiap pertanyaan
            $tracer = new Questions();
            $tracer->pertanyaan = $pertanyaan;
            $tracer->opsi = json_encode($optionsList);
            $tracer->status = 'none';
            $tracer->save();
        }

        // print_r($optionsList);

        return response()->json(['message' => 'Pertanyaan berhasil disimpan.']);






        // dd($questionsData);

    }
    public function updateQuestion(Request $request)
    {


        $questionId = $request->input('id');
        $pertanyaan = $request->input('pertanyaan');
        $opsi = $request->input('opsi');

        $jsonStringFromDatabase = trim($opsi, '"');

        $phpArray = json_decode($jsonStringFromDatabase, true);
        $question = Questions::find($questionId);
        $question->pertanyaan = $pertanyaan;
        $question->opsi = $jsonStringFromDatabase;
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
        $tracer = Questions::all();
        dd($tracer);
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
