<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Event\Tracer\Tracer;

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

        return view('alumni.tracer_study', compact('alumni','tracer', 'status_tracer'));
    }

    public function forum()
    {
        //
        return view('alumni.forum_diskusi');

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
