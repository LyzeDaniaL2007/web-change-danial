@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')
    @if ($level === 'admin')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Peminjaman</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Create Data Peminjaman</li>
            </ol>
            <form action="{{ route('action.update.peminjaman', ['id' => $peminjaman->peminjaman_id]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="peminjaman_denda_id" class="form-label">Peminjam</label>
                    <input class="form-control" value="{{ $peminjaman->user->user_nama }}">
                </div>

                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="peminjaman_denda_id" class="form-label">Denda</label>
                    <input type="number" name="peminjaman_denda_id" id="peminjaman_denda_id" class="form-control"
                        placeholder=" " min="0" step="0.01">
                </div>

                <div class="form-group py-3 col-12 col-md-6 col-lg-4">
                    <label for="peminjaman_note_id" class="form-label">Catatan</label>
                    <textarea name="peminjaman_note_id" id="peminjaman_note_id" class="form-control" placeholder=" " rows="3"></textarea>
                </div>

                <button class="btn btn-warning">Selesaikan</button>
            </form>
        </div>
    @endif
@endsection
