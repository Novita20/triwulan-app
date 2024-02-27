<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->has('master_program')) {
        //     $master_program = Master_program::where('nama_program', 'LIKE', $request->master_program . '%')->paginate(2)->withQueryString();
        // } else {
        //     $master_program = Master_program::paginate(10);
        // }
        $master_program = Program::paginate(10);

        return view('master_program.masprogram', [
            'master_program' => $master_program
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_program.create_master_program')
            ->with('url_form', url('/master_program'));
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
            'tahun' => 'required|string|max:4',
            'nomor_rekening' => 'required|string|max:30',
            'nama_program' => 'required|string',

        ]);
        Master_program::create([
            'tahun' => $request->post('tahun'),
            'nomor_rekening' => $request->post('nomor_rekening'),
            'nama_program' => $request->post('nama_program')
        ]);
        return redirect('master_program')
            ->with('success', 'Data master Program Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_program  $master_program
     * @return \Illuminate\Http\Response
     */
    public function show(Master_program $master_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_program  $master_program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master_program = Master_program::find($id);
        return view('master_program.create_master_program')
            ->with('master_program', $master_program)
            ->with('url_form', url('/master_program/' . $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_program  $master_program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|string|max:4',
            'nomor_rekening' => 'required|string|max:30',
            'nama_program' => 'required|string',

        ]);

        $data = Master_program::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('master_program')
            ->with('success', 'Data Master Program Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_program $master_program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master_program::where('id', '=', $id)->delete();
        return redirect('master_program')
            ->with('success', 'data Berhasil Dihapus');
    }
}
