<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKegiatan;
use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class IndikatorKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tahun != null) {
            $kegiatan = IndikatorKegiatan::whereHas('program', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            })->get();
        } else {
            $kegiatan = IndikatorKegiatan::all();
        }

        return view('indikator_kegiatan.indkegiatan', [
            'kegiatan' => $kegiatan,
            'selected_tahun' => $request->tahun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = Program::all()->pluck('tahun')->unique();
        return view('indikator_kegiatan.create_indikator_kegiatan', [
            'url_form' => url('indikator_kegiatan'),
            'tahun' => $tahun
        ]);
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
            'kegiatan' => 'required',
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        $insert = new IndikatorKegiatan();
        $insert->kegiatan_id = $request->kegiatan;
        $insert->indikator = $request->indikator;
        $insert->target = $request->target;
        $insert->satuan = $request->satuan;
        $insert->pagu = $request->pagu;
        $insert->save();

        if ($insert) {
            return redirect('kegiatan/indikator')
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
            ->with('url_form', url('/kegiatan/indikator/' . $id))
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

        $update = IndikatorKegiatan::where('id', $id)->update([
            'kegiatan_id' => $request->input('kegiatan'),
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($update) {
            return redirect('kegiatan/indikator')
                ->with('success', 'Data Indikator Kegiatan berhasil diedit');
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
            return redirect('kegiatan/indikator')
                ->with('success', 'Data Indikator Kegiatan berhasil dihapus');
        } else {
            return back()->with('error', 'Data Gagal dihapus');
        }
    }
}
