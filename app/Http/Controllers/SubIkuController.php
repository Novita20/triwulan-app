<?php

namespace App\Http\Controllers;

use App\Models\SubIku;
use App\Models\SubIkuKinerja;
use App\Models\SubIkuSasaran;
use App\Models\SubIkuTahun;
use Illuminate\Http\Request;

class SubIkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun = SubIkuTahun::all();
        $data = SubIku::all();
        return view('sub_iku.sub_iku_index')->with('data', $data)->with('tahun', $tahun);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sub_iku/create_sub_iku')
            ->with('url_form', url('indikator_program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'misi' => 'required',
            'tujuan' => 'required',
            'formula' => 'required|image',
            'target_number_' => 'required',
            'deskripsi_' => 'required',
        ]);
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
