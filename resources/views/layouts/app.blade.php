<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title><!-- menampilkan title dinamis yang ada di index.blade.php-->
    
    <!-- menampilkan css -->
    @include('Backend-Layout.css')
    
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"><!--navbar & scroll, footer &  sidebar fixed diatas -->
    <div class="wrapper">

        <!-- menampilkan navbar -->
        @include('Backend-Layout.navbar')
        {{-- <x-jet-banner />
        @livewire('navigation-menu') --}}

        <!-- menampilkan sidebar -->
        @if (auth()->user()->hak_akses != 0 && auth()->user()->status_aktif != 0)
            @include('Backend-Layout.sidebar')  
        @endif

        <!-- Main content -->
        {{-- memanggil content dinamik yang ada di index.blade.php --}}
        @if(!empty($slot))<!-- apabila menggunakan jetstream -->
            <div class="content-wrapper">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @else
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @yield('content')

            </div>
        @endif
        <!-- /.content-wrapper -->

        <!-- menampilkan footer -->
        @include('Backend-Layout.footer')

        @if (auth()->user()->hak_akses != 0 && auth()->user()->status_aktif != 0)
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        @endif
    </div>
    <!-- ./wrapper -->

        <!-- menampilkan javascript -->
        @include('Backend-Layout.js')
        @yield('extra_javascript')

    </body>
</html>
