<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\Realisasi;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Realisasi::with('indkinerja')->get()->groupBy('kinerja_id');
        return view('realisasi.realisasi_anggaran', [
            'data' => $data
        ]);
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
    public function show(Request $request)
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
    public function update(Request $request)
    {
        $request->validate([
            'realisasi_id' => 'required',
            'kinerja' => 'string|nullable',
            'satuan' => 'string',
            'realisasi_anggaran' => 'numeric|nullable',
            'faktor_pendorong' => 'string|nullable',
            'faktor_penghambat' => 'string|nullable',
            'masalah' => 'string|nullable',
            'solusi' => 'string|nullable',
        ]);

        $update = Realisasi::where('id', $request->realisasi_id)->update($request->except(['_token', '_method', 'realisasi_id']));

        if ($update) {
            return redirect()->back()->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRealisasi(Request $request)
    {
        $data = Realisasi::where('kinerja_id', $request->kinerja_id)->get();

        return response()->json($data);
    }

    public function getRealisasiById($id)
    {
        $data = Realisasi::where('id', $id)->first();

        return response()->json($data);
    }
}
