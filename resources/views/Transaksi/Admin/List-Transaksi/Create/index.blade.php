{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Deliverys')
@section('breadcrumb','Deliverys')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Transaksi.Admin.List-Transaksi.Create.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Transaksi.Admin.List-Transaksi.Create.jsSide')
    @include('Transaksi.Admin.List-Transaksi.Create.jsLive')
@endsection