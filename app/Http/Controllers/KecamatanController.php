<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the kecamatan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return response()->json($kecamatan);
    }

    /**
     * Display a listing of kecamatan based on kab_kota_id.
     *
     * @param  int  $kabKotaId
     * @return \Illuminate\Http\Response
     */
    public function getByKabKotaId($kabKotaId)
    {
        $kecamatan = Kecamatan::where('kab_kota_id', $kabKotaId)->get();
        return response()->json($kecamatan);
    }

    /**
     * Display the specified kecamatan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            return response()->json(['message' => 'Kecamatan not found'], 404);
        }

        return response()->json($kecamatan);
    }
}
