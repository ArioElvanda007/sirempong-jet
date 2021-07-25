{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Payment')
@section('breadcrumb','Payment')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Transaksi.Sewa.Bayar.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Transaksi.Sewa.Bayar.jsSide')
    @include('Transaksi.Sewa.Bayar.jsLive')
@endsection