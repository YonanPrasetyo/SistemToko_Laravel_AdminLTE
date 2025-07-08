@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Yonan Store</h1>
@stop

@section('content')
    <p>Selamat datang di Yonan Store. <br> Ini adalah halaman utama Yonan Store.</p>

    <div class="row">
        <!-- Card Produk -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $produk }}</h3>
                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('produk.index') }}" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Card Transaksi -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $transaksi }}</h3>
                    <p>Total Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('transaksi.index') }}" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Card Konsumen -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $konsumen }}</h3>
                    <p>Total Konsumen</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('konsumen.index') }}" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card Total Pendapatan -->
    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp {{ number_format($total, 0, ',', '.') }}</h3>
                <p>Total Pendapatan</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="{{ route('transaksi.index') }}" class="small-box-footer">
                Detail Transaksi <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
