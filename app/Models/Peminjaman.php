<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    protected $index = 'peminjaman_user_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'peminjaman_id',
        'peminjaman_user_id',
        'peminjaman_tglpinjam_id',
        'peminjaman_tglkembali_id',
        'peminjaman_statuskembali_id',
        'peminjaman_note_id',
        'peminjaman_denda_id',
    ];

    public function user()
    {
        // Side effect from the original `User` model (Model, Foreign Field, Owner Field)
        return $this->belongsTo(User::class, 'peminjaman_user_id', 'user_id');
    }

    public function peminjamanDetail()
    {
        return $this->belongsTo(PeminjamanDetail::class, 'peminjaman_id');
    }

    public function buku()
    {
        return $this->hasManyThrough(Buku::class, PeminjamanDetail::class, 'peminjaman_detail_peminjaman_id', 'buku_id', 'peminjaman_id', 'peminjaman_detail_buku_id');
    }
}
