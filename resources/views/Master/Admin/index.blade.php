{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Admin')
@section('breadcrumb','Admin')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Admin.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Admin.jsSide')
    @include('Master.Admin.jsLive')
@endsection