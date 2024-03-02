<?php

namespace App\Http\Controllers;

use App\Models\IndikatorProgram;
use App\Models\Program;
use Illuminate\Http\Request;

class IndikatorProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tahun != null) {
            $program = IndikatorProgram::whereHas('program', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            })->get();
        } else {
            $program = IndikatorProgram::all();
        }

        return view('indikator_program.indprogram')
            ->with('program', $program);
    }

    /**7
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_program = Program::all();

        return view('indikator_program.create_indikator_program')
            ->with('url_form', url('indikator_program'))
            ->with('master_program', $master_program);
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
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        // $data = Indikator_program::create($request->except(['_token']));
        // return redirect('indikator_program')
        //                 ->with('success', 'Data Indikator Program Berhasil Ditambahkan');
        $cariProgram = IndikatorProgram::where('id', $request->nama_program)->first();
        $insert = new IndikatorProgram();
        $insert->program_id = $request->program;
        $insert->indikator = $request->indikator;
        $insert->target = $request->target;
        $insert->satuan = $request->satuan;
        $insert->pagu = $request->pagu;
        $insert->save();

        if ($insert) {
            return redirect('indikator_program')->with('success', 'Data Indikator program berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndikatorProgram  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function show(IndikatorProgram $indikator_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndikatorProgram  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indikator_program = IndikatorProgram::find($id);
        $master_program = Program::all();
        return view('indikator_program.create_indikator_program')
            ->with('indikator_program', $indikator_program)
            ->with('url_form', route('indikator_program.update', $id))
            ->with('master_program', $master_program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indikator_program  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'indikator' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'satuan' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $update = IndikatorProgram::where('id', $id)->update([
            'program_id' => $request->program,
            'indikator' => $request->indikator,
            'target' => $request->target,
            'satuan' => $request->satuan,
            'pagu' => $request->pagu

        ]);

        if ($update) {
            return redirect('indikator_program')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return back()->with('error', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndikatorProgram $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IndikatorProgram::where('id', '=', $id)->delete();
        return redirect('indikator_program')
            ->with('success', 'data Berhasil Dihapus');
    }
}
