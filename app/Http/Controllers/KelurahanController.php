<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the kelurahan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::all();
        return response()->json($kelurahan);
    }

    /**
     * Display a listing of kelurahan based on kecamatan_id.
     *
     * @param  int  $kecamatanId
     * @return \Illuminate\Http\Response
     */
    public function getByKecamatanId($kecamatanId)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($kelurahan);
    }

    /**
     * Display the specified kelurahan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = Kelurahan::find($id);

        if (!$kelurahan) {
            return response()->json(['message' => 'Kelurahan not found'], 404);
        }

        return response()->json($kelurahan);
    }
}
