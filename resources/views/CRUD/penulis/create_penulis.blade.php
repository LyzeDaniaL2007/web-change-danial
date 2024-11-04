@extends('template.layout')

@section('title', 'Halaman Create Penulis')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
    @if ($level === 'admin')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Create Data Penulis</li>
                </ol>
                <form action="{{ route('action.createpenulis') }}" class="row my-4 gap-3" method="post">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Penerbit</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan nama penulis">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="tmptlahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tmptlahir" id="tmptlahir" class="form-control"
                            placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgllahir" id="tgllahir" class="form-control"
                            placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
    @endif
@endsection
