<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreBookRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'kode_buku' => 'required|max:4',
            'nama_buku' => 'required|min:10|max:40',
            'penerbit_buku' => 'required|min:10|max:40',
            'tahun_terbit' => 'nullable|digits:4',
            'penulis_buku' => 'required|min:10|max:40',
        ];
    }

    public function messages() : array
    {
        return [
            'kode_buku.required' => 'Kode Buku wajib diisi.',
            'kode_buku.max' => 'Kode Buku maksimal berisi 4 huruf.',
            'nama_buku.required' => 'Nama Buku wajib diisi.',
            'nama_buku.min' => 'Nama Buku minimal berisi 10 huruf.',
            'nama_buku.max' => 'Nama Buku maksimal berisi 40 huruf.',
            'penerbit_buku.required' => 'Penerbit Buku wajib diisi.',
            'penerbit_buku.min' => 'Penerbit Buku minimal berisi 10 huruf.',
            'penerbit_buku.max' => 'Penerbit Buku maksimal berisi 40 huruf.',
            'tahun_terbit.digits' => 'Tahun Terbit maksimal berisi 4 angka.',
            'penulis_buku.required' => 'Penulis Buku wajib diisi.',
            'penulis_buku.min' => 'Penulis Buku minimal berisi 10 huruf.',
            'penulis_buku.max' => 'Penulis Buku maksimal berisi 40 huruf.',
        ];
    }
}

