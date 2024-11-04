@extends('template.layout')

@section('title', 'Halaman Update Kategori')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Update Data Kategori</li>
        </ol>
        <form action="{{ route('action.updatekategori', ['kategori_id' => $kategori->kategori_id  ]) }}" class="row my-4 gap-3" method="post">
            @csrf
            @method('PATCH')
            <div class="d-flex flex-row mb-3">
                <div class="col-auto">
                    {{-- <label for="nama" class="form-label">Nama Kategori</label> --}}
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukkan nama kategori" value="{{ $kategori->kategori_nama }}">
                </div>
                <div class="col-auto mx-2">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
