@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Create Data Buku</li>
        </ol>
        <form action="{{ route('action.createbuku') }}" class="row my-4 gap-3" method="post">
            @csrf
            <div class="form-group col-12 col-md-6 col-lg-4">
                <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-control">
                    <option selected value="">
                        -Pilih Penerbit Buku-
                    </option>
                    
                    @foreach ($data_fk['penerbit'] as $data)
                        <option value={{ $data->penerbit_id }}>
                            {{ $data->penerbit_nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <select name="buku_penulis_id" id="buku_penulis_id" class="form-control">
                    <option selected value="">
                        -Pilih Penulis Buku-
                    </option>
                    @foreach ($data_fk['penulis'] as $data)
                        <option value={{ $data->penulis_id }}>
                            {{ $data->penulis_nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <select name="buku_kategori_id" id="buku_kategori_id" class="form-control">
                    <option selected value="">
                        -Pilih Kategori Buku-
                    </option>
                    @foreach ($data_fk['kategori'] as $data)
                        <option value={{ $data->kategori_id }}>
                            {{ $data->kategori_nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <select name="buku_rak_id" id="buku_rak_id" class="form-control">
                    <option selected value="">
                        -Pilih Rak Buku-
                    </option>
                    @foreach ($data_fk['rak'] as $data)
                        <option value={{ $data->rak_id }}>
                            {{ $data->rak_nama_id }} ({{ $data->rak_lokasi_id }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder=" ">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="isbn" class="form-label">Nomor ISBN</label>
                <input type="number" name="isbn" id="isbn" class="form-control" placeholder=" ">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="thnterbit" class="form-label">Tahun Terbit</label>
                <input type="number" name="thnterbit" id="thnterbit" class="form-control" placeholder=" ">
            </div>
            <div class="form-group col-12 ccol-md-6 col-lg-4">
                <label for="formFile" class="form-label">Cover Buku</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <button class="btn btn-success" type="submit">Tambahkan</button>
            </div>
        </form>
    </div>
    </main>
    @include('template.footer')
    </div>
    </div>
@endsection
