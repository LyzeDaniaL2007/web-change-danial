<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);


        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('nama'),
        ];
        // 
        // return $data;


        Kategori::createKategori($data);

        return redirect()->route('kategoriadmin')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // return $id;
        $data = [
            'kategori_nama' => $request->input('nama'),
        ];

        Kategori::updateKategori($id, $data);

        return redirect()->route('kategoriadmin')->with('success', 'Data kategori berhasil diupdate!');
    }

    public function delete($id)
    {
        Kategori::deleteKategori($id);

        return redirect()->route('kategoriadmin')->with('deleted', 'Data kategori berhasil dihapus!');
    }
}
