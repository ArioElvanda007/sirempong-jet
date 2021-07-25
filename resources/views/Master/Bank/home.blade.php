<div> 
    {{-- <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Master Jenis</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='/master/bank'>Home</a></li>
                <li class="breadcrumb-item active">Master Bank</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section> --}}

    <section class="content">
        {{-- <div class="card"> --}}
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#create_data"><i class="fa fa-plus-circle mr-1"></i>
                    Add New
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bank</th>
                        <th scope="col">No. Rekening</th>
                        <th scope="col">Atas Nama</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master_banks as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>    
                        <td>{{ $data->nama_bank }}</td>
                        <td>{{ $data->nomor_rekening }}</td>
                        <td>{{ $data->atas_nama }}</td>
                        <td>      
                            {{-- melalui via modal --}}
                            <a href="#">
                                <i class="fa fa-edit mr-2"
                                    data-toggle="modal"
                                    data-target="#edit_data"
                                    data-myid="{{$data->id}}"
                                    data-mynama_bank="{{$data->nama_bank}}"
                                    data-mynomor_rekening="{{$data->nomor_rekening}}"
                                    data-myatas_nama="{{$data->atas_nama}}"
                                    >
                                </i>
                            </a>

                            <a href="#">
                                <i class="fa fa-trash text-danger"
                                 data-toggle="modal" data-target="#delete_data" data-myid="{{$data->id}}"
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
<div class="modal fade" id="delete_data">
    <div class="modal-dialog modal-sm">
    <form autocomplete="off" id="validate" action="{{route('bank.delete')}}" method="GET">
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
            <input type="hidden" id="id" name="id" value="">
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
<div class="modal fade" id="create_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form autocomplete="off" id="validate" action="{{route('bank.store')}}" method="POST"><!-- jika showEditModal = true maka edit, jika false maka create -->
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
                        <label for="nama_bank" class="col-sm-2 col-form-label">Bank</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Input nama bank" required>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <label for="nomor_rekening" class="col-sm-2 col-form-label">No. Rek</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Input nomor rekening" required>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <label for="atas_nama" class="col-sm-2 col-form-label">Atas Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Input atas nama" required>
                        </div>
                    </div>  

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
<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form autocomplete="off" id="validate" action="{{route('bank.update','test')}}" method="POST">
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
                    <input type="hidden" id="id" name="id" value="">

                    <div class="row mb-3">
                        <label for="nama_bank" class="col-sm-2 col-form-label">Bank</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Input nama bank" value="" required>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <label for="nomor_rekening" class="col-sm-2 col-form-label">No. Rek</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Input nomor rekening" value="" required>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <label for="atas_nama" class="col-sm-2 col-form-label">Atas Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Input atas nama" value="" required>
                        </div>
                    </div>  

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
