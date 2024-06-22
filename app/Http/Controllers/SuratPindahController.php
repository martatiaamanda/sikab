<?php

namespace App\Http\Controllers;

use App\Models\SuratPindah;
use Illuminate\Http\Request;

class SuratPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.surat.pindah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratPindah $suratPindah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPindah $suratPindah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratPindah $suratPindah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratPindah $suratPindah)
    {
        //
    }
}
