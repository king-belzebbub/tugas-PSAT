<?php

namespace App\Http\Controllers;

use App\Models\Detail_Tindakan;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Detail_TindakanController extends Controller
{
    public function api()
    {
        return response()->json(Detail_Tindakan::all());
    }

    public function index()
    {
        $details = Detail_Tindakan::with(['kunjungan.pasien', 'tindakan'])->get();
        $kunjungans = Kunjungan::with('pasien')->get();
        $tindakans = Tindakan::all();

        return view('detail_tindakan', compact('details', 'kunjungans', 'tindakans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }


        $detailTindakan = Detail_Tindakan::create($validator->validated());

        // Kalau request dari form biasa, redirect ke index dengan pesan sukses
        return redirect()->route('detail-tindakan.index')
            ->with('success', 'Detail tindakan berhasil ditambahkan');
    }

    public function show($id)
    {
        $detailTindakan = Detail_Tindakan::with(['kunjungan', 'tindakan'])->find($id);

        if (!$detailTindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Detail tindakan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $detailTindakan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Detail tindakan tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $detailTindakan->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Detail tindakan berhasil diperbarui!',
            'data'    => $detailTindakan
        ], 200);
    }

    public function destroy($id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Detail tindakan tidak ditemukan'
            ], 404);
        }

        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return redirect()->back()->with('error', 'Detail tindakan tidak ditemukan');
        }

        $detailTindakan->delete();

        return redirect()->back()->with('success', 'Detail tindakan berhasil dihapus!');
    }


}
