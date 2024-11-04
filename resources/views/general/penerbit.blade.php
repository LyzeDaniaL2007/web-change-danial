@extends('template.layout')

@section('title', 'Halaman Penerbit')

@section('header')
    @include('template.navbar.navbar_admin')
@endsection

@section('main')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Penerbit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Data Penerbit</li>
        </ol>
        <a href="{{ route('create_penerbit') }}">
            <button class="btn btn-primary my-3">Tambah Penerbit</button>
        </a>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('updated'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('updated') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('deleted'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Nama Penerbit</th>
                        <th scope="row">Alamat Penerbit</th>
                        <th scope="row">No Telp Penerbit</th>
                        <th scope="row">Email Penerbit</th>
                        <th scope="row">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerbit as $penerbit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penerbit->penerbit_nama }}</td>
                            <td>{{ $penerbit->penerbit_alamat }}</td>
                            <td>{{ $penerbit->penerbit_notelp }}</td>
                            <td>{{ $penerbit->penerbit_email }}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <a href="{{ route('update_penerbit', ['penerbit_id' => $penerbit->penerbit_id]) }}">
                                        <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form
                                        action="{{ route('penerbit.delete', ['penerbit_id' => $penerbit->penerbit_id]) }}"
                                        method="POST" class="mx-2">
                                        @csrf
                                        @method('DELETE')

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">
                                                            Konfirmasi</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
