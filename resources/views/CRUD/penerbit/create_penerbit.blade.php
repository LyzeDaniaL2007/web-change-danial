@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
@if ($level === 'admin')
<div>
    <div class="container">
        <h1>Penerbit Buku</h1>
        <form action="{{ route('action.createpenerbit') }}" class="row my-4 gap-3" method="post">
            @csrf
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="nama" class="form-label">Nama Penerbit</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerbit">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="alamat" class="form-label">Alamat Penerbit</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat penerbit">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="notelp" class="form-label">No Telp Penerbit</label>
                <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan notelp penerbit">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="email" class="form-label">Email Penerbit</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email penerbit">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <button class="btn btn-success" href="penerbitadmin" type="submit">Tambahkan</button>
            </div>
        </form>
        
    </div>
</div>
@endif
@endsection






























