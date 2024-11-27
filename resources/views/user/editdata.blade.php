@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang</h2>

    <form action="{{ route('UpdateDataAction', $barang->id_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $barang->jumlah_barang }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection