<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tahun != null) {
            $master_kegiatan = Kegiatan::whereHas('program', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            })->get();
        } else {
            $master_kegiatan = Kegiatan::all();
        }


        return view('master_kegiatan.kegiatan', [
            'master_kegiatan' => $master_kegiatan,
            'selected_tahun' => $request->tahun
        ]);
    }

    public function getKegiatan(Request $request)
    {
        $master_kegiatan = Kegiatan::whereHas('program', function ($q) use ($request) {
            $q->where('tahun', $request->tahun);
        })->get();

        return response()->json($master_kegiatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Program::all();
        $program = $data->groupBy('tahun');
        $tahun = $data->pluck('tahun')->unique();
        return view('master_kegiatan.create_kegiatan')
            ->with('url_form', url('/kegiatan'))
            ->with('tahun', $tahun)
            ->with('program', $program);
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
            'program' => 'required',
            'no_rekening' => 'required|string',
            'nama_kegiatan' => 'required|string',
        ]);

        $insert = new Kegiatan();
        $insert->program_id = $request->program;
        $insert->no_rekening = $request->no_rekening;
        $insert->nama_kegiatan = $request->nama_kegiatan;
        $insert->save();

        if ($insert) {
            return redirect('kegiatan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return back()->with('error', 'Data Gagal Ditambahkan');
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
        $data = Program::all();
        $program = $data->groupBy('tahun');
        $tahun = $data->pluck('tahun')->unique();
        $master_kegiatan = Kegiatan::where('id', $id)->first();

        return view('master_kegiatan.create_kegiatan')
            ->with('url_form', url('/kegiatan/' . $id))
            ->with('master_kegiatan', $master_kegiatan)
            ->with('program', $program)
            ->with('tahun', $tahun);
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
            'program' => 'required',
            'no_rekening' => 'required|string',
            'nama_kegiatan' => 'required|string',
        ]);

        $cariProgram = Program::where('id', $request->program)->first();

        $update = Kegiatan::where('id', $id)->update([
            'program_id' => $request->program,
            'no_rekening' => $request->no_rekening,
            'nama_kegiatan' => $request->nama_kegiatan

        ]);

        if ($update) {
            return redirect('kegiatan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return back()->with('error', 'Data Gagal Ditambahkan');
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
        Kegiatan::where('id', $id)->delete();
        return redirect('kegiatan')
            ->with('success', 'data Berhasil Dihapus');
    }
}
