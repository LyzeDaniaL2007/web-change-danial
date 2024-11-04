@extends('template.layout')

@section('title', 'Buku - ' . ($level == 'admin' ? 'Admin' : '') . ' Perpustakaan')

@section('main')

    @if ($level === 'admin')
        <div>
            <div class="container my-5">
                <h1>Buku</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view"
                            type="button" role="tab" aria-controls="view" aria-selected="true">Lihat Buku
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
                        <h2 class="my-3">Lihat Data Buku</h2>
                        <a href="{{ route('create_buku') }}" class="btn btn-primary">Tambahkan Buku</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Penulis</th>
                                    <th>Nama Penerbit</th>
                                    <th>Nama Kategori</th>
                                    <th>Rak</th>
                                    <th>Judul Buku</th>
                                    <th>Nomor ISBN</th>
                                    <th>Tahun Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- data kategori buku -->
                                @foreach ($buku as $buku)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $buku->buku_id }}</td>
                                        <td>{{ $buku->relasiPenulis->penulis_nama }}</td>
                                        <td>{{ $buku->relasiPenerbit->penerbit_nama }}</td>
                                        <td>{{ $buku->relasiKategori->kategori_nama }}</td>
                                        <td>{{ $buku->relasiRak->rak_nama_id }} ({{ $buku->relasiRak->rak_lokasi_id }})
                                        </td>
                                        <td>{{ $buku->buku_judul }}</td>
                                        <td>{{ $buku->buku_isbn }}</td>
                                        <td>{{ $buku->buku_thnterbit }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{ route('update_buku', ['buku_id' => $buku->buku_id]) }}">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                <form action="{{ route('buku.delete', ['buku_id' => $buku->buku_id]) }}"
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
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Hapus</button>
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
    @elseif ($level == 'siswa')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Buku</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Daftar Buku</li>
            </ol>
            <div class="row gap-4">
                @foreach ($buku as $buku)
                    <div class="card col-12 col-md-4 col-lg-3">
                        <div class="card-body">
                            <img src="./img/bulan.jpg" alt="Bulan" class="book-img">
                            <hr>
                            <p class="text-center fw-bolder fs-4 my-0">{{ $buku->buku_judul }}</p>
                            <p class="text-center mb-3">Ditulis oleh {{ $buku->relasiPenulis->penulis_nama }}</p>
                            <form action="{{ route("action.pinjambuku", ['id' => $buku->buku_id]) }}">
                                <button class="btn btn-primary d-block mx-auto" type="submit">Pinjam</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
