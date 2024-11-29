<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
  public function index()
  {
    return view('views.buku', ['level' => 'siswa']);
  }

  public function indexAdmin()
  {
    return view('views.buku', ['level' => 'admin']);
  }


  public function create(Request $request)
  {
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
      'buku_id' => $id,
      'buku_penulis_id' => $request->buku_penulis_id,
      'buku_penerbit_id' => $request->buku_penerbit_id,
      'buku_kategori_id' => $request->buku_kategori_id,
      'buku_rak_id' => $request->buku_rak_id,
      'buku_judul' => $request->judul,
      'buku_isbn' => $request->isbn,
      'buku_thnterbit' => $request->thnterbit,
    ];

    Buku::createBuku($data);

    if ($request->hasFile('buku_gambar')) {
      $data = $request->file('buku_gambar');

      Buku::imageUpload($id, $data);
    }

    return redirect()->route('bukuadmin')->with('success', 'Data Buku berhasil ditambahkan!');
  }

  public function update(Request $request, $id)
  {
    $data = [
      'buku_id' => $id,
      'buku_penulis_id' => $request->input('penulis'),
      'buku_penerbit_id' => $request->input('penerbit'),
      'buku_kategori_id' => $request->input('kategori'),
      'buku_rak_id' => $request->input('rak'),
      'buku_judul' => $request->input('judul'),
      'buku_isbn' => $request->input('isbn'),
      'buku_thnterbit' => $request->input('thnterbit'),
    ];

    Buku::updateBuku($id, $data);

    return redirect()->route('bukuadmin')->with('updated', 'Data Buku berhasil diupdate!');
  }

  public function delete($id)
  {
    Buku::deleteBuku($id);
    return redirect()->route('bukuadmin')->with('deleted', 'Data buku berhasil dihapus!');
    Buku::imageDelete($id);
    Buku::where('buku_id', $id)->delete();
  }

  public function upload_profile(Request $request, $id)
  {

    return redirect()->route('bukuadmin')->with('success', 'foto profil berhasil diperbarui');

    return back()->with('failed', 'foto profil gagal diperbarui!');
  }
}
