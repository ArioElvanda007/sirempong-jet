{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    @if (auth()->user()->hak_akses != 0 && auth()->user()->status_aktif != 0)
        @include('Dashboard.html')
    @else
        @if (auth()->user()->hak_akses == 0)
            @include('Dashboard.newUser')
        @else
            @include('Dashboard.blank')            
        @endif
    @endif
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Dashboard.js')
@endsection