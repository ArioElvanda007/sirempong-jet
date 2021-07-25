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
                <li class="breadcrumb-item"><a href='/master/product'>Home</a></li>
                <li class="breadcrumb-item active">Master Product</li>
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
                        <th scope="col"></th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga Product</th>
                        <th scope="col">Harga Promo</th>
                        <th scope="col">Jml Unit</th>
                        <th scope="col">Ready Stock</th>
                        <th scope="col">Promo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master_products as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>    
                        <td>
                            <img id="preview" src="{{ asset('img/'.$data->gambar) }}" alt="preview image" height="50px" width="50px">
                        </td>
                        <td>{{ $data->nama_product }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>{{ $data->harga_product }}</td>
                        <td>{{ $data->harga_promo }}</td>
                        <td>{{ $data->jumlah_product }}</td>
                        <td>{{ $data->stok }}</td>
                        <td class="text-center"><input type="checkbox" name="promo_checkbox[{{ $data->id }}]" disabled
                            @if($data->status_promo) checked @endif>
                        </td>

                        <td>      
                            {{-- melalui via modal --}}
                            <a href="#">
                                <i class="fa fa-edit mr-2"
                                    data-toggle="modal"
                                    data-target="#edit_data"
                                    data-myid="{{$data->id}}"
                                    data-mynama="{{$data->nama_product}}"
                                    data-myidjenis="{{$data->id_jenis}}"
                                    data-mynamajenis="{{$data->jenis}}"
                                    data-myhargaproduct="{{$data->harga_product}}"
                                    data-myhargapromo="{{$data->harga_promo}}"
                                    data-myjumlahproduct="{{$data->jumlah_product}}"
                                    data-mystatuspromo="{{$data->status_promo}}"
                                    data-mygambar="{{$data->gambar}}"
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
    <form autocomplete="off" id="validate" action="{{route('product.delete')}}" method="GET">
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
        <form autocomplete="off" id="validate" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data"><!-- jika showEditModal = true maka edit, jika false maka create -->
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
                    <div class="row">
                        <!-- left column Data -->
                        <div class="col-md-4">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Upload Gambar</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="gambar" name="gambar" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-img">
                                        <img id="preview_image" src="{{ asset('img/no image.png') }}" alt="preview image">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- right column Data -->
                        <div class="col-md-8">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Input Data</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="nama_product" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Input nama product" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="id_jenis" class="col-sm-4 col-form-label">Jenis</label>
                                        <div class="col-sm-8">
                                            <select name="id_jenis" id="id_jenis" class="form-control" required>
                                                <option value="">--Pilih Jenis--</option>
                                                @foreach ($master_jenis as $data)
                                                    <option value="{{$data->id}}">{{$data->jenis}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                
                                    <div class="row mb-3">
                                        <label for="jumlah_product" class="col-sm-4 col-form-label">Jml Unit</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="jumlah_product" name="jumlah_product" placeholder="Input jumlah unit product" value="0" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="harga_product" class="col-sm-4 col-form-label">Harga Product</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="harga_product" name="harga_product" placeholder="Input harga product" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="harga_promo" class="col-sm-4 col-form-label">Harga Promo</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="harga_promo" name="harga_promo" placeholder="Input harga promo" value="0" required>
                
                                            <div class="custom-control custom-checkbox mt-3">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="promo_checkbox" value="1">
                                                <label for="customCheckbox1" class="custom-control-label">Status Promo</label>
                                            </div>   
                                        </div>
                                    </div>  
                
                                </div>
                            </div>
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
        <form autocomplete="off" id="validate" action="{{route('product.update','test')}}" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" id="id_gambar" name="id_gambar" value="">

                    <div class="row">
                        <!-- left column Data -->
                        <div class="col-md-4">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Upload Gambar</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="gambar2" name="gambar2" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12">
                                        <img id="preview_image2" src="{{ asset('img/no image.png') }}" alt="preview image">
                                    </div> --}}
                                    <div class="modal-img">
                                    
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- right column Data -->
                        <div class="col-md-8">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Input Data</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="nama_product" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Input nama product" value="" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="id_jenis" class="col-sm-4 col-form-label">Jenis</label>
                                        <div class="col-sm-8">
                                            <select name="id_jenis" id="id_jenis" class="form-control" required>
                                                <option value="">--Pilih Jenis--</option>
                                                @foreach ($master_jenis as $data)
                                                    <option value="{{$data->id}}">{{$data->jenis}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                
                                    <div class="row mb-3">
                                        <label for="jumlah_product" class="col-sm-4 col-form-label">Jml Unit</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="jumlah_product" name="jumlah_product" placeholder="Input jumlah unit product" value="" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="harga_product" class="col-sm-4 col-form-label">Harga Product</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="harga_product" name="harga_product" placeholder="Input harga product" value="" required>
                                        </div>
                                    </div>  
                
                                    <div class="row mb-3">
                                        <label for="harga_promo" class="col-sm-4 col-form-label">Harga Promo</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="harga_promo" name="harga_promo" placeholder="Input harga promo" value="" required>
                
                                            <div class="custom-control custom-checkbox mt-3">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="promo_checkbox" value="1">
                                                <label for="customCheckbox2" class="custom-control-label">Status Promo</label>
                                            </div>   
                                        </div>
                                    </div>  
                
                                </div>
                            </div>
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
