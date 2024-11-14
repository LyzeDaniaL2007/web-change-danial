@extends('template.layout')

@section('title', 'Peminjaman - ' . ($level == 'admin' ? 'Admin' : '') . ' Perpustakaan')

@section('main')
    @if ($level === 'admin')
        <div>
            <div class="container my-5">
                <h1>Peminjaman</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view"
                            type="button" role="tab" aria-controls="view" aria-selected="true">Lihat Peminjaman
                            Peminjaman</button>
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
                    <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                        <h2 class="my-3">Lihat Data Peminjaman</h2>
                        <a href="#" class="btn btn-primary">Tambahkan Peminjaman</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Denda</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tgl Pinjam</th>
                                    <th scope="col">Tgl Kembali</th>
                                    <th scope="col">Asik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $peminjamans)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjamans->user->user_nama }}</td>

                                        @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                            <td>Rp{{ $peminjamans->peminjaman_denda_id }}</td>
                                        @else
                                            <td>-</td>
                                        @endif

                                        @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                            <td>{{ $peminjamans->peminjaman_note_id }}</td>
                                        @else
                                            <td>-</td>
                                        @endif

                                        <td>{{ $peminjamans->buku[0]->buku_judul }}</td>

                                        @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                            <td>Selesai</td>
                                        @else
                                            <td>Belum Kembali</td>
                                        @endif
                                        <td>{{ $peminjamans->peminjaman_tglpinjam_id }}</td>

                                        @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                            <td>{{ $peminjamans->peminjaman_tglkembali_id }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a
                                                    href="{{ route('peminjaman.update', ['id' => $peminjamans->peminjaman_id]) }}">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                <form
                                                    action="{{ route('action.delete.peminjaman', ['id' => $peminjamans->peminjaman_id]) }}"
                                                    method="POST" class="mx-2">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

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
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($level == 'siswa')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Peminjaman</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Daftar Peminjaman</li>
            </ol>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Denda</th>
                        <th scope="col">Note</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tgl Pinjam</th>
                        <th scope="col">Tgl Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $peminjamans)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                <td>Rp{{ $peminjamans->peminjaman_denda_id }}</td>
                            @else
                                <td>-</td>
                            @endif

                            @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                <td>{{ $peminjamans->peminjaman_note_id }}</td>
                            @else
                                <td>-</td>
                            @endif

                            <td>{{ $peminjamans->buku[0]->buku_judul }}</td>

                            @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                <td>Selesai</td>
                            @else
                                <td>Belum Kembali</td>
                            @endif
                            <td>{{ $peminjamans->peminjaman_tglpinjam_id }}</td>

                            @if ($peminjamans->peminjaman_statuskembali_id == 1)
                                <td>{{ $peminjamans->peminjaman_tglkembali_id }}</td>
                            @else
                                <td>-</td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
