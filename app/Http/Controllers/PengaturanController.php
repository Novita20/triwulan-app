<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('pengaturan')){
            $pengaturan = Pengaturan::where('triwulan', 'LIKE', $request->pengaturan.'%')->paginate(2)->withQueryString();
        }else{
            $pengaturan = Pengaturan::paginate(2);
        }
        return view('pengaturan.pengaturan', [
            'pengaturan' => $pengaturan
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaturan.create_pengaturan')
                    ->with('url_form', url('/pengaturan'));
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
            'triwulan' => 'required|string|max:30',
            
        ]);

        $data = Pengaturan::create($request->except(['_token']));
        return redirect('pengaturan')
                        ->with('success', 'Data Indikator Kinerja Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaturan $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaturan = Pengaturan::find($id);
        return view('pengaturan.create_pengaturan')
                    ->with('pengaturan', $pengaturan)
                    ->with('url_form', url('/pengaturan/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'triwulan' => 'required|string|max:30',
            
        ]);

        $data = Pengaturan::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('pengaturan')
                        ->with('success', 'Data Indikator Kinerja Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaturan $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaturan::where('id', '=', $id)->delete();
        return redirect('pengaturan')
                        ->with('success', 'data Berhasil Dihapus');
    }
}
