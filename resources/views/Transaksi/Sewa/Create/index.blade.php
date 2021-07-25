{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','List Products')
@section('breadcrumb','List Products')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Transaksi.Sewa.Create.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Transaksi.Sewa.Create.jsSide')
    @include('Transaksi.Sewa.Create.jsLive')
@endsection