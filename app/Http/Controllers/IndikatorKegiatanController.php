<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class IndikatorKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IndikatorKegiatan::all();

        return view('indikator_kegiatan.indkegiatan')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_kegiatan = Kegiatan::all();

        return view('indikator_kegiatan.create_indikator_kegiatan')
            ->with('url_form', url('/indikator'))
            ->with('master_kegiatan', $master_kegiatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required',
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        $cariKegiatan = Kegiatan::where('id', $request->kegiatan)->first();

        $insert = IndikatorKegiatan::create([
            'rekening_program' => $cariKegiatan->no_rekening,
            'kegiatan' => $cariKegiatan->nama_kegiatan,
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($insert) {
            return redirect('indikator_kegiatan')
                ->with('success', 'Data Indikator Kegiatan berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master_kegiatan = Kegiatan::all();
        $indikator_kegiatan = IndikatorKegiatan::where('id', $id)->first();

        return view('indikator_kegiatan.create_indikator_kegiatan')
            ->with('url_form', url('/indikator' . $id))
            ->with('master_kegiatan', $master_kegiatan)
            ->with('indikator_kegiatan', $indikator_kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required',
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        $cariKegiatan = Kegiatan::where('id', $request->kegiatan)->first();

        $update = IndikatorKegiatan::where('id', $id)->update([
            'rekening_program' => $cariKegiatan->no_rekening,
            'nama_kegiatan' => $cariKegiatan->nama_kegiatan,
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($update) {
            return redirect('indikator_kegiatan')
                ->with('success', 'Data Indikator Kegiatan berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = IndikatorKegiatan::where('id', $id)->delete();

        if ($delete) {
            return redirect('indikator_kegiatan')
                ->with('success', 'Data Indikator Kegiatan berhasil dihapus');
        } else {
            return back()->with('error', 'Data Gagal dihapus');
        }
    }
}
