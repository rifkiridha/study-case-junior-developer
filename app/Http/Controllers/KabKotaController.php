<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use Illuminate\Http\Request;

class KabKotaController extends Controller
{
    /**
     * Display a listing of the kab_kota.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabKota = KabKota::all();
        return response()->json($kabKota);
    }

    /**
     * Display a listing of kab_kota based on provinsi_id.
     *
     * @param  int  $provinsiId
     * @return \Illuminate\Http\Response
     */
    public function getByProvinsiId($provinsiId)
    {
        $kabKota = KabKota::where('provinsi_id', $provinsiId)->get();
        return response()->json($kabKota);
    }

    /**
     * Display the specified kab_kota.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabKota = KabKota::find($id);

        if (!$kabKota) {
            return response()->json(['message' => 'KabKota not found'], 404);
        }

        return response()->json($kabKota);
    }
}
