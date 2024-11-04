@extends('template.layout')

@section('title', 'Kategori - ' . ($level == 'admin' ? 'Admin' : '') . ' Perpustakaan')

@section('main')

    @if ($level === 'admin')
        <div>
            <div class="container my-5">
                <h1>Kategori Buku</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view"
                            type="button" role="tab" aria-controls="view" aria-selected="true">Lihat Kategori
                            Buku</button>
                    </li>
                </ul>


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
                <div class="tab-content" id="myTabContent">
                    <!-- Lihat Data Kategori Buku -->
                    <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                        <h2 class="my-3">Lihat Data Kategori Buku</h2>
                        <a href="{{ route('create_kategori') }}" class="btn btn-primary">Tambahkan Kategori</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- data kategori buku -->
                                @foreach ($kategori as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->kategori_nama }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a
                                                    href="{{ route('update_kategori', ['kategori_id' => $kategori->kategori_id]) }}">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                <form
                                                    action="{{ route('kategori.delete', ['kategori_id' => $kategori->kategori_id]) }}"
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
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
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
                                @endforeach
                                {{-- <tr>
                                    <td>2</td>
                                    <td>Non-Fiksi</td>
                                    <td>
                                        <a href="#update" class="btn btn-warning btn-sm" data-bs-toggle="tab"
                                            data-bs-target="#update">Update</a>
                                    </td>
                                </tr> --}}
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
