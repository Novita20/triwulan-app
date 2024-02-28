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
            ->with('url_form', url('/program'));
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

            'no_rekening' => 'required|string|max:30',
            'nama_program' => 'required|string',
            'tahun' => 'required|string|max:4'

        ]);
        Program::create([

            'no_rekening' => $request->input('no_rekening'),
            'nama_program' => $request->input('nama_program'),
            'tahun' => $request->input('tahun')
        ]);
        return redirect('program')
            ->with('success', 'Data master Program Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_program  $master_program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $master_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $master_program = Program::find($id);
        return view('master_program.create_master_program')
            ->with('master_program', $master_program)
            ->with('url_form', url('/program/' . $id));
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

            'no_rekening' => 'required|string|max:30',
            'nama_program' => 'required|string',
            'tahun' => 'required|string|max:4'

        ]);

        $data = Program::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('program')
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
        Program::where('id', '=', $id)->delete();
        return redirect('program')
            ->with('success', 'data Berhasil Dihapus');
    }
}
