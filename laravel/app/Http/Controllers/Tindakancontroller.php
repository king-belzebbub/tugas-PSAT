<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        $tindakans = Tindakan::all();
        return view('tindakan.index', compact('tindakans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kode_icd' => 'nullable|string|unique:tindakans,kode_icd',
        ]);

        Tindakan::create($validated);

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $tindakan = Tindakan::findOrFail($id);

        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kode_icd' => 'nullable|string|unique:tindakans,kode_icd,' . $id,
        ]);

        $tindakan->update($validated);

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->delete();

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil dihapus');
    }

    // Kalau memang tidak perlu dipakai, method create() dan show() bisa dihapus supaya controller lebih ringkas
}
