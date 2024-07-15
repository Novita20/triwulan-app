<?php

namespace App\Http\Controllers;

use App\Models\SubIku;
use App\Models\SubIkuKinerja;
use App\Models\SubIkuSasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mockery\Exception;

class SubIkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $year = $req->get('year', 2022);
        $program = $req->get('nama');
        if ($program) {
            $data = SubIku::where('misi_rpjmd', 'like', "%$program%")->get();
        }else{
            $data = SubIku::all();
        }
        return view('sub_iku.sub_iku_index')->with('data', $data)
            ->with('first_year', $year);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sub_iku/create_sub_iku')
            ->with('url_form', url('sub_iku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'misi' => 'required',
            "sasaran" => "required",
            'tujuan_pd' => 'required',
            'sasaran_pd' => 'required',
            'tujuan_rp' => 'required',
            'indikator' => 'required',
            'formula' => 'required|image',
            'kondisi' => 'required',
            "tahun_1" => "required",
            "tahun_2" => "required",
            "tahun_3" => "required",
            "tahun_4" => "required",
            "tahun_5" => "required",
            "target_number_1" => "required",
            "target_number_2" => "required",
            "target_number_3" => "required",
            "target_number_4" => "required",
            "target_number_5" => "required",
            "deskripsi_1" => "required",
            "deskripsi_2" => "required",
            "deskripsi_3" => "required",
            "deskripsi_4" => "required",
            "deskripsi_5" => "required",
        ]);

        try {
            \DB::beginTransaction();
            $iku = new SubIku();
            $iku->misi_rpjmd = $data['misi'];
            $iku->tujuan_rpjmd = $data['tujuan_rp'];
            $iku->sasaran_rpjmd  = $data['sasaran_pd'];
            $iku->tujuan_pd = $data['tujuan_pd'];
            $iku->kondisi_awal = $data['kondisi'];
            $iku->save();

            if (!Storage::exists('sub_iku')) {
                Storage::makeDirectory('sub_iku');
            }

            $ikuSasaran = new SubIkuSasaran();
            $ikuSasaran->sasaran_pd = $data['sasaran_pd'];
            $ikuSasaran->indikator_tujuan = $data['indikator'];
            $ikuSasaran->sub_iku_id = $iku->id;
            if ($request->file('formula')->isValid()) {
                $file = $request->file('formula');
                $extension = $file->getClientOriginalExtension();
                $newName = Str::uuid() . '.' . $extension; // Gunakan UUID untuk nama file yang unik

                // Simpan file dengan nama baru
                $path = $file->storeAs('sub_iku', $newName);
                $ikuSasaran->formula ="sub_iku/". $newName;
            }
            $ikuSasaran->save();

            for ($i = 1; $i <= 5; $i++) {
                $kinerja = new SubIkuKinerja();
                $kinerja->sub_iku_id = $iku->id;
                $kinerja->sub_iku_sasaran_id = $ikuSasaran->id;
                $kinerja->tahun = $data['tahun_'.$i];
                $kinerja->angka_kinerja = $data['target_number_'.$i];
                $kinerja->satuan = $data['deskripsi_'.$i];
                $kinerja->save();
            }

            \DB::commit();

            return redirect('sub_iku')
                    ->with('success', 'Data Indikator Kegiatan berhasil disimpan');
        }catch (Exception $e){
            \DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
