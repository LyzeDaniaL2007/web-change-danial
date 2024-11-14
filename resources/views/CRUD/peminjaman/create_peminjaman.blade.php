@extends('template.layout')

@section('title', 'Buku - ' . ($level == 'admin' ? 'Admin' : '') . ' Perpustakaan')

@section('main')

@section('content_subtitle', 'Form tambah kategori')
<div class="mb-5">
    <form action={{ route('action.peminjaman.create') }} method="POST">
        @csrf
        <div class="mt-4">
            <label for="peminjaman_user_id" class="form-label">Peminjam</label>
            <select class="form-select" id="peminjaman_user_id" name="peminjaman_user_id" required>
                <option selected>
                    -Pilih User Peminjam-
                </option>
                @foreach ($data['user'] as $user)
                    <option value="{{ $user['user_id'] }}">
                        {{ $user['user_username'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="peminjaman_detail_buku_id" class="form-label">Peminjam</label>
            <select class="form-select" id="peminjaman_detail_buku_id" name="peminjaman_detail_buku_id" required>
                <option selected>
                    -Pilih Buku-
                </option>
                @foreach ($data['buku'] as $buku)
                    <option value="{{ $buku['buku_id'] }}">
                        {{ $buku['buku_judul'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <input type="submit" value="Tambahkan Peminjaman" class="btn btn-primary" />
        </div>
    </form>
</div>
@endsection
