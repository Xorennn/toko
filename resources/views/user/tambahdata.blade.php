@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Tambah Barang</h2>

    <!-- Tampilkan pesan error jika ada -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('TambahDataAction') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama barang" required>
        </div>

        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan jumlah barang" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection