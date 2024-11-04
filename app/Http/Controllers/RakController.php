<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'rak_id' => $id,
            'rak_nama_id' => $request->input('nama'),
            'rak_lokasi_id' => $request->input('lokasi'),
            'rak_kapasitas_id' => $request->input('kapasitas'),
        ];

        Rak::createRak($data);

        return redirect()->route('rakadmin')->with('success', 'Data rak berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'rak_id' => $id,
            'rak_nama_id' => $request->input('nama'),
            'rak_lokasi_id' => $request->input('lokasi'),
            'rak_kapasitas_id' => $request->input('kapasitas'),
        ];

        Rak::updateRak($id, $data);

        return redirect()->route('rakadmin')->with('updated', 'Data rak berhasil diupdate!');
    }

    public function delete($id)
    {
        Rak::deleteRak($id);

        return redirect()->route('rakadmin')->with('deleted', 'Data rak berhasil dihapus!');
    }
}
