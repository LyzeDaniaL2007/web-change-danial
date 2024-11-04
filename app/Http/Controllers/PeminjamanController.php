<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Str;
use App\Models\PeminjamanDetail;

class PeminjamanController extends Controller
{
    public function create ($id)
{
    $user_id = 'djgkforu12nvoDfg';

    $peminjaman_id = Str::random(16);
    $current_date = date("Y-m-d");

    $data_peminjaman = [
        'peminjaman_id' => $peminjaman_id,
        'peminjaman_user_id' => $user_id,
        'peminjaman_tglpinjam_id' => $current_date,
        'peminjaman_tglkembali_id' => $current_date,
        'peminjaman_note_id' => "",
        'peminjaman_denda_id' => 0,
        'peminjaman_statuskembali_id' => 0
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
            'peminjaman_note' => $request->peminjaman_note,
            'peminjaman_denda' => $request->peminjaman_denda,
            'peminjaman_statuskembali' => 1,
            'peminjaman_tglkembali' => $current_date
        ];

        Peminjaman::where('peminjaman_id', $id)->update($data);

        return redirect()->route('peminjamanadmin', ['action' => 'show'])->with('success', 'Peminjaman berhasil diselesaikan!');
    }

    public static function delete($id)
    {
        Peminjaman::where('peminjaman_id', $id)->delete();
    }

    public static function deleteIndex()
    {
        Peminjaman::where('peminjaman_statuskembali', 1)->delete();
    }
    
}    

