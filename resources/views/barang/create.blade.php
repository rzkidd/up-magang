@extends('layout')
@section('main')
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                Home
            </div>
            <ul class="navbar-nav me-auto d-flex flex-row">
                <li class="nav-item me-3">
                    <a href="/barang" class="nav-link">Barang</a>
                </li>
                <li class="nav-item">
                    <a href="/category" class="nav-link">Kategori</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Tambah barang</h3>
        <form action="/barang/create" method="post">
        @csrf
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama barang</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="jumlah" class="form-label">Jumlah barang</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control " style="width: 100px" required>
            </div>
            <div class="form-group mb-3">
                <label for="category" class="form-label">Kategori barang</label>
                {{-- <input type="checkbox" name="category" id="category"> --}}
                <select name="category" id="category" class="form-select">
                    <option value=""></option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>


            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection