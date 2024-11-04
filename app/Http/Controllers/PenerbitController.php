<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Http\Controllers\Controller;

class PenerbitController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $request->input('nama'),
            'penerbit_alamat' => $request->input('alamat'),
            'penerbit_notelp' => $request->input('notelp'),
            'penerbit_email' => $request->input('email'),
        ];

        Penerbit::createPenerbit($data);

        return redirect('penerbitadmin')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $request->input('nama'),
            'penerbit_alamat' => $request->input('alamat'),
            'penerbit_notelp' => $request->input('notelp'),
            'penerbit_email' => $request->input('email'),
        ];

        Penerbit::updatePenerbit($id, $data);

        return redirect()->route('penerbitadmin')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function update_penerbit($id)
    {
        $penerbit = Penerbit::readPenerbitById($id);

        return view('actions.penerbit.update_penerbit', ['level' => 'admin'])->with('penerbit', $penerbit);
    }

    public function delete($id)
    {
        Penerbit::deletePenerbit($id);

        return redirect()->route('penerbitadmin')->with('deleted', 'Data penerbit berhasil dihapus!');
    }
}
