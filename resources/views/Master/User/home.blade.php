<div> 
    {{-- <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Master User</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='/master/user'>Home</a></li>
                <li class="breadcrumb-item active">Master User</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section> --}}

    <section class="content">
        {{-- <div class="card"> --}}
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#create_user"><i class="fa fa-plus-circle mr-1"></i>
                    Add New
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No. Telp</th>
                        {{-- <th scope="col">Hak Akses</th> --}}
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master_users as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                        <input type="hidden" name="id_akses" value="{{ $data->id_akses }}">
                        <input type="hidden" name="password_user" value="{{ $data->password_user }}"> --}}
    
                        <td>{{ $data->name_user }}</td>
                        <td>{{ $data->email_user }}</td>
                        <td>{{ $data->no_telp }}</td>
                        {{-- <td>{{ $data->hak_akses }}</td> --}}
                        <td>      
                            {{-- melalui via modal --}}
                            <a href="#">
                                <i class="fa fa-edit mr-2"
                                    data-toggle="modal"
                                    data-target="#edit_user"
                                    data-myiduser="{{$data->id_user}}"
                                    data-mynameuser="{{$data->name_user}}"
                                    data-myemailuser="{{$data->email_user}}"
                                    data-mynotelp="{{$data->no_telp}}"
                                    data-mypassword="{{$data->password_user}}"
                                    {{-- data-myidaksesn="{{$data->id_akses}}"
                                    data-myhakaksesn="{{$data->hak_akses}}" --}}
                                    >
                                </i>
                            </a>

                            <a href="#">
                                <i class="fa fa-trash text-danger"
                                 data-toggle="modal" data-target="#delete_user" data-myiduser="{{$data->id_user}}"
                                >
                                </i>
                            </a>

                        </td>    
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          {{-- </div> --}}
          <!-- /.card -->

    </section>
</div>

{{-- delete data --}}
<div class="modal fade" id="delete_user">
    <div class="modal-dialog modal-sm">
    <form autocomplete="off" id="validate" action="{{route('user.delete')}}" method="GET">
        @method('PATCH')
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_user" name="id_user" value="">
          <p>Yakin data ingin didelete ?&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>
                <span> Delete</span>
            </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<!-- Create Modal -->
<div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form autocomplete="off" id="validate" action="{{route('user.store')}}" method="POST"><!-- jika showEditModal = true maka edit, jika false maka create -->
            {{-- {{@csrf_field()}} --}}
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        <span>Add New Data</span>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="name_user" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Name" required>
                        </div>
                    </div>  

                    <div class="form-group row">
                        <label for="email_user" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No. Telp" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_user" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konfirmasi_password" class="col-sm-2 col-form-label">Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Confirm" required>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="hak_aksesn" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-10">
                            <select name="hak_aksesn" id="hak_aksesn" class="form-control" required>
                                <option value="">--Pilih Hak Akses--</option>
                                <option value="1">Administrator</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>                         --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                        <span> Save</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

  {{-- modal edit --}}
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form autocomplete="off" id="validate" action="{{route('user.update','test')}}" method="POST">
            {{-- @method('PATCH') --}}
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        <span>Edit Data</span>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user" value="">
                    <input type="hidden" id="id_akses" name="id_akses" value="">

                    <div class="row mb-3">
                        <label for="name_user" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name_user" name="name_user" value="" placeholder="Input nama user" required>
                        </div>
                    </div>                        

                    <div class="row mb-3">
                        <label for="email_user" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_user" name="email_user" value="" placeholder="Input email user" required>
                        </div>
                    </div>                        

                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="" placeholder="No. Telp" required>
                        </div>
                    </div>                        

                    {{-- <div class="form-group row">
                        <label for="password_user" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konfirmasi_password" class="col-sm-2 col-form-label">Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Confirm" required>
                        </div>
                    </div> --}}

                    {{-- <div class="row mb-3">
                        <label for="hak_aksesn" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-10">
                            <select name="hak_aksesn" id="hak_aksesn" class="form-control" required>
                                <option value="">--Pilih Hak Akses--</option>
                                <option value="1">Administrator</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>                                               --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                        <span> Save Changes</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
