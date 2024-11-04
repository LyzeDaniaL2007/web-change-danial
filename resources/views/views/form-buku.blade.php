<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Data Buku</h2>
        <form action="/buku" method="post">
            @csrf
            <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" id="kode_buku" name="kode_buku" value="{{old('kode_buku') }}">
                @error('kode_buku')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_buku">Nama Buku</label>
                <input type="text" id="nama_buku" name="nama_buku" value="{{old('nama_buku') }}">
                @error('nama_buku')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="penerbit_buku">Penerbit Buku</label>
                <input type="text" id="penerbit_buku" name="penerbit_buku" value="{{old('penerbit_buku') }}">
                @error('penerbit_buku')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{old('tahun_terbit') }}">
                @error('tahun_terbit')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="penulis_buku">Penulis Buku</label>
                <input type="text" id="penulis_buku" name="penulis_buku" value="{{old('penulis_buku') }}">
                @error('penulis_buku')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>
</html>