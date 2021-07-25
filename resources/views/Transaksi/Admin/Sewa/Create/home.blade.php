<form action="{{route('transaksi_adminsewa.store')}}" method="POST">
  @csrf
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
      <div class="card-body">
        <input type="hidden" id="id_sewa" name="id_sewa" value="{{$transaksi_sewas->id_sewa}}">

        <div class="row">
            <!-- left column Data -->
            <div class="col-md-2 mt-6">
                <img id="preview_image" src="{{ asset('img/'.$transaksi_sewas->gambar) }}" alt="preview image">
            </div>

            <!-- right column Data -->
            <div class="col-md-6">
              <div class="card-body">
                <h1 style="color:gray;font-size:40px;text-align:right;" class="mb-2">{{$transaksi_sewas->nomor_sewa}}</h1> 
                <hr><br>
                <h1 style="color:gray;font-size:30px;" class="mb-2">{{$transaksi_sewas->nama_product}}</h1> 

                <!-- Date range -->
                <div class="form-group mb-2">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right datetimepicker-input" data-target="#reservationdate" id="reservation" name = "tanggal_sewa" disabled>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="row mb-2">
                  <label for="jumlah_hari" class="col-sm-3 col-form-label">Jml Hari</label>
                  <div class="col-sm-9">
                      <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="{{$transaksi_sewas->jumlah_hari}}" disabled>
                  </div>
                </div>  

                <div class="row mb-2">
                    <label for="harga_product" class="col-sm-3 col-form-label">Harga Product</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="harga_product" name="harga_product" value="{{$transaksi_sewas->harga_product}}" disabled>
                    </div>
                </div>  

                <div class="row mb-2">
                    <label for="harga_promo" class="col-sm-3 col-form-label">Harga Promo</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="harga_promo" name="harga_promo" value="{{$transaksi_sewas->harga_promo}}" disabled>      
                    </div>
                </div>  

                <div class="row mb-2">
                  <label for="jumlah_product" class="col-sm-3 col-form-label">Jml Unit</label>
                  <div class="col-sm-9">
                      <input type="number" class="form-control" id="jumlah_product" name="jumlah_product" value="{{$transaksi_sewas->jumlah_sewa}}" disabled>
                  </div>
                </div>  

                <div class="row mb-2">
                  <label for="total_sewa" class="col-sm-3 col-form-label">Total</label>
                  <div class="col-sm-9">
                      <input type="number" class="form-control" id="total_sewa" name="total_sewa" value="{{$transaksi_sewas->total}}" disabled>
                  </div>
                </div>                            

              </div>

              <div class="modal-footer">
                <a href="{{route('transaksi_adminsewa.index')}}" class="btn btn-danger"><i class="fa fa-times mr-1"></i> Cancel</a></li></a>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                    <span>Save</span>
                </button>
              </div>
        
            </div>
        </div>

      </div>
    </section>
  </div>
</form>
