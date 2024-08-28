<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the provinsi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $provinsi = Provinsi::all();
        return response()->json($provinsi);
    }

    /**
     * Display the specified provinsi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): Response
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json(['error' => 'Provinsi not found'], 404);
        }

        return response()->json($provinsi);
    }
}
