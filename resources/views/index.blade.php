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
@endsection