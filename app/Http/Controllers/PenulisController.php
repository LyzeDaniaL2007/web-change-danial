<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);


        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tmptlahir'),
            'penulis_tgllahir' => $request->input('tgllahir')
        ];
        // 
        // return $data;


        penulis::createpenulis($data);

        return redirect()->route('penulisadmin')->with('success', 'Data penulis berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // return $id;
        $data = [
            'penulis_nama' => $request->input('nama'),
        ];

        penulis::updatepenulis($id, $data);

        return redirect()->route('penulisadmin')->with('success', 'Data penulis berhasil diupdate!');
    }

    public function delete($id)
    {
        penulis::deletepenulis($id);

        return redirect()->route('penulisadmin')->with('deleted', 'Data penulis berhasil dihapus!');
    }
}
