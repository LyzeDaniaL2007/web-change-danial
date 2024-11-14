<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Rak;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesController extends Controller
{
  public function loginPage()
  {
    return view('public.login');
  }

  public function dashboardadmin()
  {
    return view('general.dashboard', ['level' => 'admin']);
  }

  public function dashboardsiswa()
  {
    return view('general.dashboard', ['level' => 'siswa']);
  }

  public function bukuadmin()
  {
    $data = Buku::with(['relasiPenulis', 'relasiPenerbit', 'relasiKategori', 'relasiRak'])->get();

    // return $data;

    return view('general.buku', ['level' => 'admin', 'buku' => $data]);
  }

  public function bukusiswa()
  {
    $buku = Buku::with(['relasiPenulis'])->get();

    // return $buku;
    return view('general.buku', ['level' => 'siswa', 'buku' => $buku]);
  }

  public function rakadmin()
  {
    $data = Rak::all();
    return view('general.rak', ['level' => 'admin', 'rak' => $data]);
  }

  public function peminjamanadmin()
  {
    $peminjaman = Peminjaman::with(['buku', 'user'])->get();
    return view('general.peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman]);
  }

  public function updatepeminjaman($id)
  {
    $peminjaman = Peminjaman::find($id);
    return view('CRUD.peminjaman.update_peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman]);
  }

  public function peminjamansiswa()
  {
    $user_id = 'djgkforu12nvoDfg';
    $peminjaman = Peminjaman::with(['buku'])->where('peminjaman_user_id', $user_id)->get();
    // return $peminjaman;
    return view('general.peminjaman', ['level' => 'siswa', 'peminjaman' => $peminjaman]);
  }

  public function pengaturanadmin()
  {
    return view('general.pengaturan', ['level' => 'admin']);
  }
  public function pengaturansiswa()
  {
    return view('general.pengaturan', ['level' => 'siswa']);
  }



  // Buku
  public function create_buku()
  {
    $rak_fk_field = Rak::select('rak_id', 'rak_nama_id', 'rak_lokasi_id')->get();
    $penulis_fk_field = Penulis::select('penulis_id', 'penulis_nama')->get();
    $kategori_fk_field = Kategori::select('kategori_id', 'kategori_nama')->get();
    $penerbit_fk_field = Penerbit::select('penerbit_id', 'penerbit_nama')->get();
    $data = [
      'rak' => $rak_fk_field,
      'penulis' => $penulis_fk_field,
      'kategori' => $kategori_fk_field,
      'penerbit' => $penerbit_fk_field,
    ];

    // return $data;

    return view('CRUD.buku.create_buku', ['level' => 'admin', 'data_fk' => $data]);
  }

  public function buku()
  {
    $data = Buku::readBuku();

    return view('general.buku', ['level' => 'admin'])->with('buku', $data);
  }

  public function update_buku($id)
  {
    $buku = Buku::readBukuById($id);

    return view('CRUD.buku.update_buku', ['level' => 'admin'])->with('buku', $buku);
  }

  //

  //Kategori

  public function create_kategori()
  {
    return view('CRUD.kategori.create_kategori', ['level' => 'admin']);
  }

  public function kategoriadmin()
  {
    $data = Kategori::all();

    // return $data;

    return view('general.kategori', [
      'level' => 'admin',
      'kategori' => $data,
    ]);
  }

  //

  // Penerbit

  public function penerbitadmin()
  {
    $data = Penerbit::readPenerbit();

    return view('general.penerbit', ['level' => 'admin'])->with('penerbit', $data);
  }

  public function create_penerbit()
  {
    return view('CRUD.penerbit.create_penerbit', ['level' => 'admin']);
  }

  public function update_penerbit($id)
  {
    $data = Penerbit::where('penerbit_id', $id)->first();

    return view('CRUD.penerbit.update_penerbit', [
      "penerbit" => $data,
      "level" => "admin",
    ]);
  }

  //Kategori

  public function update_kategori($id)
  {
    $data = Kategori::where('kategori_id', $id)->first();

    return view('CRUD.kategori.update_kategori', [
      "kategori" => $data,
      "level" => "admin",
    ]);
  }

  public function kategori()
  {
    $data = Kategori::readKategori();

    return view('general.kategori', ['level' => 'admin'])->with('kategori', $data);
  }

  //

  //Penulis

  public function update_penulis($id)
  {
    $data = Penulis::where('penulis_id', $id)->first();

    return view('CRUD.penulis.update_penulis', [
      "penulis" => $data,
      "level" => "admin",
    ]);
  }

  public function create_penulis()
  {
    return view('CRUD.penulis.create_penulis', ['level' => 'admin']);
  }

  public function penulis()
  {
    $data = Penulis::readPenulis();

    // bukan ini berati
    return view('general.penulis', ['level' => 'admin', 'penulis' => $data]);
  }

  public function penulisadmin()
  {
    $data = Penulis::readPenulis();

    return view('general.penulis', ['level' => 'admin', 'penulis' => $data]);
  }

  //

  //Rak

  public function create_rak()
  {
    return view('CRUD.rak.create_rak', ['level' => 'admin']);
  }

  public function rak()
  {
    $data = Rak::readRak();

    return view('general.rak', ['level' => 'admin'])->with('rak', $data);
  }

  public function update_rak($id)
  {
    $rak = Rak::readRakById($id);

    return view('CRUD.rak.update_rak', ['level' => 'admin'])->with('rak', $rak);
  }

  //Peminjaman

  public function pinjamBuku($id)
  {
    $user_id = 'djgkforu12nvoDfg';

    $buku_detail = Buku::where('buku_id', $id)->first();
    $peminjaman_id = Str::random(16);
    $current_date = date("Y-m-d");

    $data_peminjaman = [
      'peminjaman_id' => $peminjaman_id,
      'peminjaman_user_id' => $user_id,
      'peminjaman_tglpinjam' => $current_date,
      'peminjaman_tglkembali' => $current_date,
    ];

    $data_detail = [
      'peminjaman_detail_peminjaman_id' => $peminjaman_id,
      'peminjaman_detail_buku_id' => $id
    ];

    DB::table('peminjaman')->insert($data_peminjaman);
    DB::table('peminjaman_detail')->insert($data_detail);

    return redirect()->route('peminjaman')->with('success', 'Anda telah meminjam buku ' . $buku_detail['buku_judul'] . '!');
  }
}
