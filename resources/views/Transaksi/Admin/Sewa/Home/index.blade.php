{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','List Transaksi')
@section('breadcrumb','List Transaksi')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Transaksi.Admin.Sewa.Home.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Transaksi.Admin.Sewa.Home.jsSide')
    @include('Transaksi.Admin.Sewa.Home.jsLive')
@endsection