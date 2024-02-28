<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class SubKegiatanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('master_subkegiatan')){
            $master_subkegiatan = SubKegiatan::where('nama_program', 'LIKE', $request->master_subkegiatan.'%')->with('kegiatan')->paginate(10)->withQueryString();
        }else{
            $master_subkegiatan = SubKegiatan::with('kegiatan')->paginate(10);
        }    
        // dd($master_subkegiatan);
        return view('master_subkegiatan.master_subkegiatan', [
            'master_subkegiatan' => $master_subkegiatan
        ]);
    }

    public function create()
    {
        $bidang = Bidang::all();
        $program = Program::all();
        $master_kegiatan = Kegiatan::all();
        return view('master_subkegiatan.create_master_subkegiatan')
                    ->with('url_form', url('/sub_kegiatan'))
                    ->with('bidang', $bidang)
                    ->with('master_kegiatan', $master_kegiatan)
                    ->with('program', $program);
    }

    
    public function getKegiatan(Request $request)
    {
        $program = $request->get('program');
        $master_kegiatan = Kegiatan::where('nama_program', $program)->get();
        return response()->json($master_kegiatan);
    }

    public function store(Request $request)
    {
       

        // $request->validate([
        //     'tahun' => 'required',
        //     'nama_bidang' => 'required|string',
        //     'rekening_subkegiatan' => 'required|string', 
        //     'nama_subkegiatan' => 'required|string',
        // ]);
        
        $data = Program::where('id', $request->input('nama_program'))->first();
        $data1 = Kegiatan::where('id', $request->input('nama_kegiatan'))->first();
  
        // $data = Master_subkegiatan::create($request->except(['_token']));
        SubKegiatan::create([
            'tahun' => $request->input('tahun'),
            'nama_bidang' => $request->input('nama_bidang'),
            'program_id' => $request->input('nama_program'),
            'kegiatan_id' => $request->input('kegiatan_id'),
            'no_rekening' => $request->input('no_rekening'),
            'nama_subkegiatan' => $request->input('nama_subkegiatan'),
        ]);
        return redirect('sub_kegiatan')
                        ->with('success', 'Data SubKegiatan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $bidang = Bidang::all();
        $program = Program::all();
        $master_kegiatan = Kegiatan::all();
        $master_subkegiatan = SubKegiatan::find($id);
        return view('master_subkegiatan.create_master_subkegiatan')
                    ->with('master_subkegiatan', $master_subkegiatan)
                    ->with('url_form', url('/sub_kegiatan/'. $id))
                    ->with('bidang', $bidang)
                    ->with('master_kegiatan', $master_kegiatan)
                    ->with('program', $program);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'tahun' => 'required',
        //     'nama_bidang' => 'required|string',
        //     'rekening_subkegiatan' => 'required|string', 
        //     'nama_subkegiatan' => 'required|string',
        // ]);
    
        $subKegiatan = SubKegiatan::findOrFail($id);
        $subKegiatan->tahun = $request->input('tahun');
        $subKegiatan->nama_bidang = $request->input('nama_bidang');
        $subKegiatan->kegiatan_id = $request->input('kegiatan_id');
        $subKegiatan->no_rekening = $request->input('no_rekening');
        $subKegiatan->nama_subkegiatan = $request->input('nama_subkegiatan');
        $subKegiatan->save();
    
        return redirect('sub_kegiatan')->with('success', 'Data SubKegiatan Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $subKegiatan = SubKegiatan::findOrFail($id);
        $subKegiatan->delete();
    
        return redirect('sub_kegiatan')->with('success', 'Data SubKegiatan Berhasil Dihapus');
    }
    
    
}
