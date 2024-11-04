<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'buku_id',
        'buku_penulis_id',
        'buku_penerbit_id',
        'buku_kategori_id',
        'buku_rak_id',
        'buku_judul',
        'buku_isbn',
        'buku_thnterbit'
    ];

    protected static function createBuku($data)
    {
        return self::create($data);
    }

    protected static function readBuku()
    {
        $data = self::all();

        return $data;
    }

    protected static function updateBuku($id, $data)
    {
        $buku = self::find($id);

        if ($buku) {
            $buku->update($data);
            return $buku;
        }

        return null;
    }

    protected static function readBukuById($id)
    {
        $buku = self::find($id);

        return $buku;
    }

    protected static function deleteBuku($id)
    {
        return self::destroy($id);
    }

    public function relasiPenulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id');
    }

    public function relasiPenerbit()
    {
        return $this->belongsTo(Penerbit::class, 'buku_penerbit_id');
    }

    public function relasiKategori()
    {
        return $this->belongsTo(Kategori::class, 'buku_kategori_id');
    }

    public function relasiRak()
    {
        return $this->belongsTo(Rak::class, 'buku_rak_id');
    }
}
