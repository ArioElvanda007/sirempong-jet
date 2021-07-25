{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Jenis Product')
@section('breadcrumb','Jenis Product')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Jenis.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Jenis.jsSide')
    @include('Master.Jenis.jsLive')
@endsection