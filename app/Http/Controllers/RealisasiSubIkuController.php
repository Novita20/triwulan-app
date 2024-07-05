<?php

namespace App\Http\Controllers;

use App\Models\RealisasiSubIku;
use App\Models\SubIku;
use App\Models\SubIkuKinerja;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RealisasiSubIkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubIku::with(["subIkuSasaran", "subIkuKinerja.realisasiSubIku" ])->get();
        return view("sub_iku.realisasi.realisasi_sub_iku")->with("data", $data);
    }

    public function get(string $id)
    {
        $data = SubIkuKinerja::with('realisasiSubIku')->find($id);
        return response()->json($data);
    }

    public function download()
    {

        // Buat instance Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set judul kolom
        $sheet->mergeCells('A1:N1');
        $sheet->setCellValue('A1', 'Realisasi');

        // Set sub-judul kolom
        $sheet->mergeCells('A2:A4')->setCellValue('A2', 'MISI RPJMD');
        $sheet->mergeCells('B2:B4')->setCellValue('B2', 'TUJUAN RPJMD');
        $sheet->mergeCells('C2:C4')->setCellValue('C2', 'SASARAN RPJMD');
        $sheet->mergeCells('D2:D4')->setCellValue('D2', 'INDIKATOR TUJUAN / SASARAN DP');

        $currentYear = date('Y');
        $columns = ['E', 'G', 'I', 'K', 'M'];
        foreach ($columns as $index => $column) {
            $sheet->mergeCells($column.'2:'.chr(ord($column) + 1).'2')->setCellValue($column.'2', $currentYear + $index);
            $sheet->mergeCells($column.'3:'.chr(ord($column) + 1).'3')->setCellValue($column.'3', 'Kinerja');
            $sheet->setCellValue($column.'4', 'Angka');
            $sheet->setCellValue(chr(ord($column) + 1).'4', '%');
        }

        // Atur lebar kolom agar lebih rapi
        foreach (range('A', 'W') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Anda dapat mengisi data mulai dari baris ke-5
        $row = 5;
        $data = SubIku::with(["subIkuSasaran", "subIkuKinerja.realisasiSubIku" ])->get();
        foreach ($data as $subIku) {
            $sheet->setCellValue('A'.$row, $subIku->misi_rpjmd);
            $sheet->setCellValue('B'.$row, $subIku->tujuan_rpjmd);
            $sheet->setCellValue('C'.$row, $subIku->sasaran_rpjmd);
            $sheet->setCellValue('D'.$row, $subIku->subIkuSasaran->first()->indikator_tujuan);

            $realisasi = $subIku->subIkuKinerja;
            $col = 'E';
            foreach ($realisasi as $item) {
                $ki = $item->realisasiSubIku?->kinerja ?? 0;
                $sheet->setCellValue($col.$row, $ki);
                $col++;
                $sheet->setCellValue($col.$row, $ki === 0 ? 0: ($ki / $item->angka_kinerja) * 100);
                $col++;
            }

            $row++;
        }

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'realisasi.xlsx';
        $file = storage_path($fileName);
        $writer->save($file);

        return response()->download($file)->deleteFileAfterSend();
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SubIku::with(["subIkuKinerja.realisasiSubIku"])->find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                "id" => "nullable",
                "sub_iku_id" => "required",
                "sub_iku_kinerja_id" => "required",
                "kinerja" => "required",
            ]);
            $realisasiSubIku = RealisasiSubIku::where("sub_iku_id", $data["sub_iku_id"])
                ->where("sub_iku_kinerja_id", $data["sub_iku_kinerja_id"])
                ->first();
            if ($realisasiSubIku) {
                $realisasiSubIku->kinerja = $data["kinerja"];
                $realisasiSubIku->save();
                return back()->with("success", "Data berhasil disimpan");
            }
            RealisasiSubIku::create($data);
            return back()->with("success", "Data berhasil disimpan");
        }catch (\Exception $e) {
            return back()->with("error", "Terjadi kesalahan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
