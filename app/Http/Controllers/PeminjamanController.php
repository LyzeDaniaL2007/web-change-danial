<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use App\Http\Requests\SimpanPeminjamanRequest;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function store($id)
    {
        $user_id = "djgkforu12nvoDfg";

        $peminjaman_id = Str::random(16);
        $current_date = date("Y-m-d");

        $data_peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_note_id' => "",
            'peminjaman_statuskembali_id' => 0,
            'peminjaman_denda_id' => 0,
            'peminjaman_tglpinjam_id' => $current_date,
            'peminjaman_tglkembali_id' => $current_date,
        ];

        $data_detail = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $id
        ];

        Peminjaman::create($data_peminjaman);
        PeminjamanDetail::create($data_detail);

        return redirect()->route('peminjamanSiswa', ['action' => 'show'])->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $current_date = date("Y-m-d");
        $data = [
            'peminjaman_note_id' => $request->peminjaman_note_id,
            'peminjaman_denda_id' => $request->peminjaman_denda_id,
            'peminjaman_statuskembali_id' => 1,
            'peminjaman_tglkembali_id' => $current_date
        ];

        Peminjaman::where('peminjaman_id', $id)->update($data);

        return redirect()->route('peminjaman.index', ['action' => 'show'])->with('success', 'Peminjaman berhasil diselesaikan!');
    }

    public static function delete($id)
    {
        Peminjaman::where('peminjaman_id', $id)->delete();

        return redirect()->route('peminjaman.index', ['action' => 'show'])->with('success', 'Peminjaman berhasil diselesaikan!');
    }

    public static function deleteIndex()
    {
        Peminjaman::where('peminjaman_statuskembali', 1)->delete();
    }

    public static function create($id)
    {
        $peminjaman_id = Peminjaman::with(['peminjamanDetail.buku', 'user'])->findOrFail($id);
        return view('CRUD.create_peminjaman', compact('peminjaman'));
    }

    public static function createSiswa()
    {
        //
    }
}
