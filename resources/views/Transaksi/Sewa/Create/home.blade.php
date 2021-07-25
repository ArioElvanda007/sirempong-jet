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
                <li class="breadcrumb-item"><a href='/transaksi/sewa/home'>Home</a></li>
                <li class="breadcrumb-item active">Transaksi Sewa</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section> --}}

    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            @foreach ($master_products as $data)

              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    {{$data->jenis}}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{$data->nama_product}}</b></h2>
                        {{-- <br> --}}
                        <p class="text-muted text-sm"><b>Price : </b>Rp. {{$data->harga_product}} /Hari</p>
                        <p class="text-muted text-sm"><b>Promo : </b>
                          Rp.
                          @if ($data->status_promo == 1)
                            {{$data->harga_promo}} /Hari
                          @else
                            0    
                          @endif
                        </p>
                        <p class="text-muted text-sm"><b>Stock : </b>{{$data->stok}} Unit</p>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('img/'.$data->gambar) }}" alt="" class="img-square img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      {{-- <a href="#" class="btn btn-default btn-sm btn-flat">
                        <i class="fas fa-heart"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a> --}}

                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-cart-plus mr-2"
                            data-toggle="modal"
                            data-target="#create_data"
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
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
          </div>
        </div>
      </div>
    </section>

</div>

<!-- Create Modal -->
<div class="modal fade" id="create_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <form autocomplete="off" id="validate" action="{{route('transaksi_sewa.store')}}" method="POST"><!-- jika showEditModal = true maka edit, jika false maka create -->
          {{-- {{@csrf_field()}} --}}
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">
                      <span>Sewa Products</span>
                  </h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id" value="">
                  <input type="hidden" id="jumlah_harix" name="jumlah_harix" value="0">
                  <input type="hidden" id="jumlah_productx" name="jumlah_productx" value="1">
                  <input type="hidden" id="harga_productx" name="harga_productx" value="">
                  <input type="hidden" id="harga_promox" name="harga_promox" value="">

                  <div class="row">
                      <!-- left column Data -->
                      <div class="col-md-4">
                        <div class="modal-img">
                          {{-- <img id="preview_image" src="{{ asset('img/no image.png') }}" alt="preview image"> --}}
                        </div>
                      </div>

                      <!-- right column Data -->
                      <div class="col-md-8">
                        <div class="card-body">
                          <div class="lbl-product"></div>
                          <hr><br>

                          <!-- Date range -->
                          <div class="form-group mb-2">
                            <label>Date range:</label>

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control float-right datetimepicker-input" data-target="#reservationdate" id="reservation" name = "tanggal_sewa">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->

                          <div class="row mb-2">
                            <label for="jumlah_hari" class="col-sm-4 col-form-label">Jml Hari</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="0" onkeyup="hitung_total();" required>
                            </div>
                          </div>  

                          <div class="row mb-2">
                              <label for="harga_product" class="col-sm-4 col-form-label">Harga Product</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" id="harga_product" name="harga_product" value="0" disabled>
                              </div>
                          </div>  
      
                          <div class="row mb-2">
                              <label for="harga_promo" class="col-sm-4 col-form-label">Harga Promo</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" id="harga_promo" name="harga_promo" value="0" disabled>      
                              </div>
                          </div>  

                          <div class="row mb-2">
                            <label for="jumlah_product" class="col-sm-4 col-form-label">Jml Unit</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah_product" name="jumlah_product" value="0" onkeyup="hitung_total();" required>
                            </div>
                          </div>  

                          <div class="row mb-2">
                            <label for="total_sewa" class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="total_sewa" name="total_sewa" value="0" disabled>
                            </div>
                          </div>                            

                        </div>
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                      <span> Sewa</span>
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>

