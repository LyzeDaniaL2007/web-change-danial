@extends('template.layout')

@section('title', 'Peminjaman - ' . ($level == 'admin' ? 'Admin' : '') . ' Perpustakaan')


@section('main')
    @if ($level === 'admin')
        <div class="container my-5">
            <h1>Data Peminjaman Buku</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button"
                        role="tab" aria-controls="view" aria-selected="true">Lihat Data Peminjaman</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Lihat Data Peminjaman -->
                <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                    <h2 class="my-3">Lihat Data Peminjaman</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Buku</th>
                                <th>Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data peminjaman -->
                            <tr>
                                <td>1</td>
                                <td>Bulan</td>
                                <td>Tere Liye</td>
                                <td>01-08-2024</td>
                                <td>Dipinjam</td>
                                <td>
                                    <a href="#update" class="btn btn-warning btn-sm" data-bs-toggle="tab"
                                        data-bs-target="#update">Update Status</a>
                                    <a href="#denda" class="btn btn-danger" data-bs-toggle="tab"
                                        data-bs-target="#update">Denda</a>
                                </td>
                            </tr>
                            <!-- Tambahkan data lainnya di sini -->
                        </tbody>
                    </table>
                </div>

                <!-- Update Status Peminjaman -->
                <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
                    <h2 class="my-3">Update Status Peminjaman</h2>
                    <form>
                        <div class="mb-3">
                            <label for="peminjamanID" class="form-label">ID Peminjaman</label>
                            <input type="text" class="form-control" id="peminjamanID"
                                placeholder="Masukkan ID peminjaman">
                        </div>
                        <div class="mb-3">
                            <label for="statusPeminjaman" class="form-label">Status</label>
                            <select class="form-select" id="statusPeminjaman">
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    @elseif ($level === 'siswa')
        <h1 class="mt-4">Peminjaman Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
        </ol>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjaman->peminjaman_tglpinjam_id }}</td>
                        <td>{{ $peminjaman->peminjaman_tglkembali_id }}</td>
                        <td>
                            @if ($peminjaman->peminjaman_status_kembali_id)
                                Selesai
                            @else
                                Meminjam
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
