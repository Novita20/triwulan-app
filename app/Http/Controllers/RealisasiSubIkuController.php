<?php

namespace App\Http\Controllers;

use App\Models\SubIku;
use Illuminate\Http\Request;

class RealisasiSubIkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubIku::with(["subIkuSasaran", "subIkuKinerja"])->get();
        return view("sub_iku.realisasi.realisasi_sub_iku")->with("data", $data);
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
