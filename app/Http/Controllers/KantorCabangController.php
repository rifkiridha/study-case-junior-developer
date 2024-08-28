<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KantorCabang;

class KantorCabangController extends Controller
{
    public function index()
    {
        $kantorCabang = KantorCabang::all();
        return response()->json($kantorCabang);
    }

    public function show($id)
    {
        $kantorCabang = KantorCabang::find($id);
        if ($kantorCabang) {
            return response()->json($kantorCabang);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}
