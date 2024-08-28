<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the pekerjaan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return response()->json($pekerjaan);
    }

    /**
     * Display the specified pekerjaan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pekerjaan = Pekerjaan::find($id);

        if ($pekerjaan) {
            return response()->json($pekerjaan);
        }

        return response()->json(['error' => 'Pekerjaan not found'], Response::HTTP_NOT_FOUND);
    }
}
