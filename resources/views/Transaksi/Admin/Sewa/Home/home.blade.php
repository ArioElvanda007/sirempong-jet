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
        {{-- <div class="card"> --}}
            {{-- <div class="card-header">
                <a href="{{route('transaksi_sewa.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus-circle mr-1"></i> Add New
                </a>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col"></th>
                        <th scope="col">Product</th>
                        <th scope="col">No. Transaksi</th>
                        <th scope="col">Tgl. Sewa</th>
                        <th scope="col">Tgl. Kembali</th>
                        <th scope="col">Jml Hari</th>
                        <th scope="col">Harga Prod.</th>
                        <th scope="col">Harga Promo</th>
                        <th scope="col">Jml Unit</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi_sewas as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>    
                        <td>
                          <img id="preview" src="{{ asset('img/'.$data->gambar) }}" alt="preview image" height="50px" width="50px">
                        </td>
                        <td>{{ $data->nama_product }}</td>
                        <td>
                            {{ $data->nomor_sewa }}
                            <br>
                            @if ($data->status_transaksi == "Belum dibayar")<span class="badge bg-warning">{{ $data->status_transaksi }}</span>@endif
                            @if ($data->status_transaksi == "Sudah dibayar")<span class="badge bg-success">{{ $data->status_transaksi }}</span>@endif
                            @if ($data->status_transaksi == "disewa")<a href="{{route('transaksi_adminsewa.create',$data->id_sewa)}}"><span class="badge bg-primary">{{ $data->status_transaksi }}</span></a>@endif
                            @if ($data->status_transaksi == "dikembalikan")<span class="badge bg-secondary">{{ $data->status_transaksi }}</span>@endif
                            @if ($data->status_transaksi == "Cancel")<span class="badge bg-danger">{{ $data->status_transaksi }}</span>@endif
                        </td>
                        <td>{{ date('d-M-Y', strtotime($data->tanggal_sewa)) }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tanggal_kembali)) }}</td>
                        <td>{{ $data->jumlah_hari }}</td>
                        <td>{{ $data->harga_product }}</td>
                        <td>{{ $data->harga_promo }}</td>
                        <td>{{ $data->jumlah_sewa }}</td>
                        <td>{{ $data->total }}</td>
                        <td>     
                          <a href="#"><i class="fas fa-print"></i></a>
                          <a href="#"><i class="fa fa-edit"></i></a>                                

                          <a href="#">
                            <i class="fa fa-trash text-danger"
                              data-toggle="modal" data-target="#delete_data" data-myid="{{$data->id_sewa}}"
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
    <form autocomplete="off" id="validate" action="{{route('transaksi_adminsewa.delete')}}" method="GET">
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
            <input type="hidden" id="id_sewa" name="id_sewa" value="">
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
