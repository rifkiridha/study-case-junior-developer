<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonNasabah;
use Laravel\Sanctum\PersonalAccessToken;

class CalonNasabahController extends Controller
{
    /**
     * Display a listing of the calon_nasabah.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonNasabah = CalonNasabah::all();
        return response()->json($calonNasabah);
    }

    public function indexByCabang(Request $request)
    {
        $token = $request->bearerToken();
        $tokenModel = PersonalAccessToken::findToken($token);
        $user = $tokenModel->tokenable;
        $cabangId = $user->kantor_cabang_id;
        $calonNasabah = CalonNasabah::where('kantor_cabang_id', $cabangId)->get();
        return response()->json($calonNasabah);
    }
    

    /**
     * Store a newly created calon_nasabah in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'provinsi_id' => 'required|exists:provinsi,id',
            'kab_kota_id' => 'required|exists:kab_kota,id',
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'nama_jalan' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'nominal_setor' => 'required|numeric',
            'kantor_cabang_id' => 'required|exists:kantor_cabang,id',
            'status' => 'required|in:Menunggu Approval,Disetujui',
            'approved_by' => 'nullable|exists:users,id',
        ]);

        $calonNasabah = CalonNasabah::create($validated);
        return response()->json($calonNasabah, 201);
    }

    /**
     * Update the specified calon_nasabah in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $calonNasabah = CalonNasabah::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|string',
            'tempat_lahir' => 'sometimes|string',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|in:Laki-laki,Perempuan',
            'pekerjaan_id' => 'sometimes|exists:pekerjaan,id',
            'provinsi_id' => 'sometimes|exists:provinsi,id',
            'kab_kota_id' => 'sometimes|exists:kab_kota,id',
            'kecamatan_id' => 'sometimes|exists:kecamatan,id',
            'kelurahan_id' => 'sometimes|exists:kelurahan,id',
            'nama_jalan' => 'sometimes|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'nominal_setor' => 'sometimes|numeric',
            'kantor_cabang_id' => 'sometimes|exists:kantor_cabang,id',
            'status' => 'sometimes|in:Menunggu Approval,Disetujui',
            'approved_by' => 'nullable|exists:users,id',
        ]);

        $calonNasabah->update($validated);
        return response()->json($calonNasabah);
    }

    /**
     * Remove the specified calon_nasabah from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calonNasabah = CalonNasabah::findOrFail($id);
        $calonNasabah->delete();
        return response()->json(null, 204);
    }

    /**
     * Approve the specified calon_nasabah.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function approve($id,Request $request)
    {
        $calonNasabah = CalonNasabah::findOrFail($id);

        $token = $request->bearerToken();
        $tokenModel = PersonalAccessToken::findToken($token);
        $user = $tokenModel->tokenable;
        $calonNasabah->status = 'Disetujui';
        $calonNasabah->approved_by = $user->id;
        $calonNasabah->save();

        return response()->json($calonNasabah);
    }
}
