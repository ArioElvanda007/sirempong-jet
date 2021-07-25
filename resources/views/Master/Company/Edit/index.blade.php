{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Company')
@section('breadcrumb','Company')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Company.Edit.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Company.Edit.jsSide')
@endsection