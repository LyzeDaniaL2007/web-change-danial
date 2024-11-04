<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $primaryKey = 'penerbit_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'penerbit_id',
        'penerbit_nama',
        'penerbit_alamat',
        'penerbit_notelp',
        'penerbit_email',
    ];

    protected static function createPenerbit($data)
    {
        return self::create($data);
    }

    protected static function updatePenerbit($id, $data)
    {
        $penerbit = self::find($id);

        if ($penerbit) {
            $penerbit->update($data);
            return $penerbit;
        }

        return null;
    }

    protected static function readPenerbit()
    {
        $data = self::all();

        return $data;
    }

    protected static function readPenerbitById($id)
    {
        $penerbit = self::find($id);

        return $penerbit;
    }

    protected static function deletePenerbit($id)
    {
        return self::destroy($id);
    }
}
