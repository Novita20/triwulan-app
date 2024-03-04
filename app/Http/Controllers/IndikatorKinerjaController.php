<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\Realisasi;
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
        $insert = Kinerja::create([
            'subkegiatan_id' => $request->input('subkegiatan_id'),
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($insert) {
            $insert_realisasi = [];
            for ($i = 1; $i <= 4; $i++) {
                $insert_realisasi[] = [
                    'kinerja_id' => $insert->id,
                    'triwulan' => $i,
                    'kinerja' => 0,
                    'satuan' => 0,
                    'realisasi_anggaran' => 0,
                    'faktor_pendorong' => '',
                    'faktor_penghambat' => '',
                    'masalah' => '',
                    'solusi' => '',
                ];
            }

            $realisasi = Realisasi::insert($insert_realisasi);

            if ($realisasi) {
                return redirect('/indikator_kinerja')
                    ->with('success', 'Data Indikator Kinerja berhasil disimpan');
            } else {
                return back()->with('error', 'Data Gagal Disimpan');
            }
        }
    }

    public function edit($id)
    {
        $master_subkegiatan = SubKegiatan::all();
        $indikator_kinerja = Kinerja::where('id', $id)->first();

        return view('indikator_kinerja.create_indikator_kinerja')
            ->with('url_form', url('/indikator_kinerja/' . $id))
            ->with('master_subkegiatan', $master_subkegiatan)
            ->with('indikator_kinerja', $indikator_kinerja);
    }

    public function update(Request $request, $id)
    {
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
        $delete = Kinerja::where('id', $id)->delete();

        if ($delete) {
            return redirect('/indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil dihapus');
        } else {
            return back()->with('error', 'Data Gagal dihapus');
        }
    }
}
