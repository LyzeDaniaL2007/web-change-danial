@extends('template.layout')

@section('title', 'Halaman Update Penulis')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Penulis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Update Data Penulis</li>
        </ol>
        <form action="{{ route('action.updatepenulis', ['penulis_id' => $penulis->penulis_id  ]) }}" class="row my-4 gap-3" method="post">
            @csrf
            @method('PATCH')
            <div class="d-flex flex-row mb-3">
                <div class="col-auto">
                    {{-- <label for="nama" class="form-label">Nama Penulis</label> --}}
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukkan nama Penulis" value="{{ $penulis->penulis_nama }}">
                </div>
                <div class="col-auto mx-2">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
