@extends('layout')

@section('content')
<div class="container mt-4">
 <!-- Menampilkan pesan sukses -->
 @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('TambahData') }}" role="button">+ Tambah Data</a>
    <h2 class="mt-2">Daftar Barang</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $barang)
            <tr>
                <td>{{ $barang->id_barang}}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->jumlah_barang }}</td>
                <td>
    <!-- Tombol Edit -->
    <a href="{{ route('EditData', $barang->id_barang) }}" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">Edit</a>
    
    <!-- Tombol Hapus -->
    <form action="{{ route('HapusData', $barang->id_barang) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection