<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'rak';
    protected $primaryKey = 'rak_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'rak_id',
        'rak_nama_id',
        'rak_lokasi_id',
        'rak_kapasitas_id'

    ];

    protected static function createRak($data)
    {
        return self::create($data);
    }

    protected static function readRak()
    {
        $data = self::all();

        return $data;
    }

    protected static function updateRak($id, $data)
    {
        $rak = self::find($id);

        if ($rak) {
            $rak->update($data);
            return $rak;
        }

        return null;
    }

    protected static function readRakById($id)
    {
        $rak = self::find($id);

        return $rak;
    }

    protected static function deleteRak($id)
    {
        return self::destroy($id);
    }
}
