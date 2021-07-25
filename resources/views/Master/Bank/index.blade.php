{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Banks')
@section('breadcrumb','Banks')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Bank.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Bank.jsSide')
    @include('Master.Bank.jsLive')
@endsection