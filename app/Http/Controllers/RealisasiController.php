<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\Pengaturan;
use App\Models\Realisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RealisasiController extends Controller
{
    public function downloadExcel()
    {
        // Ambil data dari database
        $data = Realisasi::with('indkinerja.subkegiatan.kegiatan.program')->get()->groupBy('kinerja_id');

        // Debug data
        // if ($data->isEmpty()) {
        //     // Tambahkan logging atau debugging untuk memastikan data tidak kosong
        //     dd('Data is empty');
        // } else {
        //     dd($data); // Lihat data yang diambil
        // }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header tabel
        $sheet->setCellValue('A1', 'Program');
        $sheet->setCellValue('B1', 'Sub Kegiatan');
        $sheet->setCellValue('C1', 'Target');
        $sheet->setCellValue('D1', 'Satuan');
        $sheet->setCellValue('E1', 'Pagu');
        $sheet->setCellValue('F1', 'Triwulan 1 Kinerja');
        $sheet->setCellValue('G1', 'Triwulan 1 Anggaran');
        $sheet->setCellValue('H1', 'Triwulan 2 Kinerja');
        $sheet->setCellValue('I1', 'Triwulan 2 Anggaran');
        $sheet->setCellValue('J1', 'Triwulan 3 Kinerja');
        $sheet->setCellValue('K1', 'Triwulan 3 Anggaran');
        $sheet->setCellValue('L1', 'Triwulan 4 Kinerja');
        $sheet->setCellValue('M1', 'Triwulan 4 Anggaran');
        $sheet->setCellValue('N1', 'Total Kinerja');
        $sheet->setCellValue('O1', 'Total Anggaran');
        $sheet->setCellValue('P1', 'Keterangan');

        // Menambahkan data dari database
        $row = 2;
        foreach ($data as $realisasiGroup) {
            $realisasi = $realisasiGroup->first();
            if (!$realisasi) continue;

            $sheet->setCellValue('A' . $row, $realisasi->indkinerja->subkegiatan->kegiatan->program->nama_program ?? 'N/A');
            $sheet->setCellValue('B' . $row, $realisasi->indkinerja->subkegiatan->nama_subkegiatan ?? 'N/A');
            $sheet->setCellValue('C' . $row, $realisasi->indkinerja->target ?? 'N/A');
            $sheet->setCellValue('D' . $row, $realisasi->indkinerja->satuan ?? 'N/A');
            $sheet->setCellValue('E' . $row, $realisasi->indkinerja->pagu ?? 'N/A');

            // Asumsikan bahwa data realisasi diurutkan berdasarkan triwulan
            $colIndex = 'F';
            $totKinerja = 0;
            $totAnggaran = 0;
            foreach ($realisasiGroup as $item) {
                $sheet->setCellValue($colIndex . $row, $item->kinerja ?? 'N/A');
                $colIndex++;
                $totKinerja += $item->kinerja??0;
                $sheet->setCellValue($colIndex . $row, $item->realisasi_anggaran ?? 'N/A');
                $colIndex++;
                $totAnggaran += $item->realisasi_anggaran??0;
            }
            $sheet->setCellValue("N".$row, $totKinerja);
            $sheet->setCellValue("O".$row, $totAnggaran);

            $sheet->setCellValue('P' . $row, 'Keterangan'); // Sesuaikan dengan data keterangan jika ada
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'realisasi_anggaran.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaturan = Pengaturan::orderBy('triwulan', 'asc')->get();
        $data = Realisasi::with('indkinerja')->get()->groupBy('kinerja_id');
        return view('realisasi.realisasi_anggaran', [
            'data' => $data,
            'pengaturan' => $pengaturan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
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
    public function update(Request $request)
    {
        $request->validate([
            'realisasi_id' => 'required',
            'kinerja' => 'string|nullable',
            'satuan' => 'string',
            'realisasi_anggaran' => 'numeric|nullable',
            'faktor_pendorong' => 'string|nullable',
            'faktor_penghambat' => 'string|nullable',
            'masalah' => 'string|nullable',
            'solusi' => 'string|nullable',
        ]);

        $update = Realisasi::where('id', $request->realisasi_id)->update($request->except(['_token', '_method', 'realisasi_id']));

        if ($update) {
            return redirect()->back()->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRealisasi(Request $request)
    {
        $data = Realisasi::where('kinerja_id', $request->kinerja_id)->get();

        return response()->json($data);
    }

    public function getRealisasiById($id, $pid)
    {
        $data = Realisasi::where(['triwulan'=> $pid, 'kinerja_id' => $id])->first();

        return response()->json($data);
    }
}
