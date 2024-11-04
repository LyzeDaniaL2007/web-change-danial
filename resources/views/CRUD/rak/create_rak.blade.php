@extends('template.layout')

@section('title', 'Halaman Create Rak')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Rak</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Create Data Rak</li>
            </ol>
            <form action="{{ route('action.createrak') }}" class="row my-4 gap-3" method="post">
                @csrf
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="nama" class="form-label">Nama Rak</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder=" ">
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="lokasi" class="form-label">Lokasi Rak</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder=" ">
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="kapasitas" class="form-label">Kapasitas rak</label>
                    <select type="number" name="kapasitas" id="kapasitas" class="form-control">
                    <option value="10">
                        10
                    </option>
                    <option value="15">
                        15
                    </option>
                    <option value="20">
                        20
                    </option>
                    <option value="25">
                        25
                    </option>
                    <option value="30">
                        30
                    </option>
                    <option value="35">
                        35
                    </option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <button class="btn btn-success" type="submit">Tambahkan</button>
                </div>
            </form>
        </div>
    </main>
    </div>
@endsection
