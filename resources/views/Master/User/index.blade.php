{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','User')
@section('breadcrumb','User')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.User.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.User.jsSide')
    @include('Master.User.jsLive')
@endsection