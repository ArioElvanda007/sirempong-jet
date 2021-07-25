{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Pengembalian')
@section('breadcrumb','Pengembalian')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Transaksi.Admin.Sewa.Create.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Transaksi.Admin.Sewa.Create.jsSide')
    @include('Transaksi.Admin.Sewa.Create.jsLive')
@endsection