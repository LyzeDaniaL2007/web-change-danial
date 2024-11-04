<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kategori_id',
        'kategori_nama',

    ];

    protected static function createKategori($data)
    {
        return self::create($data);
    }

    protected static function updateKategori($id, $data)
    {
        $kategori = self::find($id);

        if ($kategori) {
            $kategori->update($data);
            return $kategori;
        }

        return null;
    }

    protected static function readKategori()
    {
        $data = self::all();

        return $data;
    }

    protected static function deleteKategori($id)
    {
        return self::destroy($id);
    }
}
