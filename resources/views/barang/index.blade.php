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

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="/barang/create" class="btn btn-primary my-3">Tambah barang</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nama Barang</td>
                    <td>Kategori</td>
                    <td>Jumlah</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="/barang/{{ $item->id }}/update" class="badge bg-warning me-3"><i class="bi bi-pencil-square"></i> </a>
                                <form action="/barang/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="badge bg-danger me-3"><i class="bi bi-trash"></i> </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
@endsection