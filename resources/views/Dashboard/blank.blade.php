
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alert</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    </head>
    <body>
        <!-- Content Wrapper. Contains page content -->
        {{-- <div class="content-wrapper"> --}}

            <!-- Main content -->
            <div class="content mt-5">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                Kepada user yang terhormat, mohon maaf anda tidak diperkenankan untuk mengakses web ini, account anda sudah diblokir oleh pihak admin. <br/>
                                berikut adalah penjelasan mengapa admin melakukan blokir account : <br/>
                                1. User melakukan beberapa <strong>pelanggaran</strong> yang sudah ditetapkan oleh pemilik web <br/>
                                2. User banyak melakukan <strong>spam</strong> sehingga membuat ketidaknyamanan pengguna lainnya <br/>
                                3. User menggunakan kalimat yang bersifat <strong>SARA</strong> <br/><br/>
                                Berikut adalah penjelasan pihak admin melakukan tindakan tegas atas pemblokiran account anda, apabila anda ingin mengajukan complaint atas ketidaknyamanan anda silahkan email ke <strong>sirempong@gmail.com</strong> <br/>
                                Mohon untuk dipahami.
                                <br/><br/>
                                Best regard<br/>
                                Administrator
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            {{-- </div> --}}
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
