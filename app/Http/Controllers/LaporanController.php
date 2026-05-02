<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();
        return view('laporan.index', compact('laporan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto'), $namaFoto);
        }

        Laporan::create([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $namaFoto
        ]);

        return redirect('/')->with('success', 'Laporan berhasil dikirim');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->foto && file_exists(public_path('foto/' . $laporan->foto))) {
            unlink(public_path('foto/' . $laporan->foto));
        }

        $laporan->delete();

        return redirect('/')->with('success', 'Laporan berhasil dihapus');
    }
}