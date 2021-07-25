{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Products')
@section('breadcrumb','Products')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Product.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Product.jsSide')
    @include('Master.Product.jsLive')
@endsection