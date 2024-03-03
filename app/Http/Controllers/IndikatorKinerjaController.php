<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class IndikatorKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $data = Kinerja::all();

        return view('indikator_kinerja.indikator_kinerja')->with('data', $data);
    }

    public function show()
    {
    }

    public function create()
    {
        $master_subkegiatan = SubKegiatan::all();

        return view('indikator_kinerja.create_indikator_kinerja')
            ->with('url_form', url('/indikator_kinerja'))
            ->with('master_subkegiatan', $master_subkegiatan);
    }

    public function store(Request $request)
    {
        // $request->validate([

        //     'indikator' => 'required',
        //     'target' => 'required|numeric',
        //     'satuan' => 'required',
        //     'pagu' => 'required|numeric',
        // ]);

        // $data = Indikator_program::create($request->except(['_token']));
        // return redirect('indikator_program')
        //                 ->with('success', 'Data Indikator Program Berhasil Ditambahkan');
        $cariProgram = Kinerja::where('id', $request->nama_subkegiatan)->first();
        $insert = Kinerja::create([
            'subkegiatan_id' => $request->input('subkegiatan_id'),
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);
        if ($insert) {
            return redirect('/indikator_kinerja')
                ->with('success', 'Data Indikator program berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        // $indikator_kinerja = Indikator_kinerja::find($id);
        // return view('indikator_kinerja.create_indikator_kinerja')
        //             ->with('indikator_kinerja', $indikator_kinerja)
        //             ->with('url_form', url('/indikator_kinerja/'. $id));

        $master_subkegiatan = SubKegiatan::all();
        $indikator_kinerja = Kinerja::where('id', $id)->first();

        return view('indikator_kinerja.create_indikator_kinerja')
            ->with('url_form', url('/indikator_kinerja' . $id))
            ->with('master_subkegiatan', $master_subkegiatan)
            ->with('indikator_kinerja', $indikator_kinerja);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nomor_rekening' => 'required|string|max:30',
        //     'sub_kegiatan' => 'required|string|max:20',
        //     'indikator' => 'required|string|max:20',
        //     'target' => 'required|string|max:20',
        //     'satuan' => 'required|string|max:20',
        //     'pagu' => 'required|string|max:20',
        // ]);

        // $data = Indikator_kinerja::where('id', '=', $id)->update($request->except(['_token', '_method']));
        // return redirect('indikator_kinerja')
        //                 ->with('success', 'Data Indikator Kinerja Berhasil Diubah');

        // $request->validate([
        //     'sub_kegiatan' => 'required',
        //     'indikator' => 'required',
        //     'target' => 'required|numeric',
        //     'satuan' => 'required',
        //     'pagu' => 'required|numeric',
        // ]);

        $cariKegiatan = SubKegiatan::where('id', $request->sub_kegiatan)->first();

        $update = Kinerja::where('id', $id)->update([
            'subkegiatan_id' => $request->input('subkegiatan_id'),
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($update) {
            return redirect('/indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    public function destroy($id)
    {
        // Indikator_kinerja::where('id', '=', $id)->delete();
        // return redirect('indikator_kinerja')
        //                 ->with('success', 'data Berhasil Dihapus');

        $delete = Kinerja::where('id', $id)->delete();

        if ($delete) {
            return redirect('/indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil dihapus');
        } else {
            return back()->with('error', 'Data Gagal dihapus');
        }
    }
}
