<form action="{{route('company.update')}}" method="POST">
  @csrf

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
                  <li class="breadcrumb-item"><a href='/master/company'>Home</a></li>
                  <li class="breadcrumb-item active">Master Company</li>
              </ol>
              </div>
          </div>
          </div><!-- /.container-fluid -->
      </section> --}}

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                      <div class="card-body">
                          <input type="hidden" id="id" name="id" value = "{{old('id', $master_companys->id)}}">

                          <div class="form-group">
                              <label for="nama_company">Nama Company</label>
                              <input type="text" class="form-control" id="nama_company" name="nama_company" value = "{{old('nama_company', $master_companys->nama_company)}}" placeholder="Input nama perusahaan/company" required>
                          </div>

                          <div class="form-group">
                              <label for="alamat_company">Alamat</label>
                              <Textarea class="form-control" rows="2" id="alamat_company" name="alamat_company" placeholder="Input alamat perusahaan" required>{{old('alamat_company', $master_companys->alamat_company)}}</Textarea>
                          </div>

                          <div class="form-group">
                              <label for="telp_company">No. Telp</label>
                              <input type="text" class="form-control" id="telp_company" name="telp_company" value = "{{old('telp_company', $master_companys->telp_company)}}" placeholder="Input nomor telepon" required>
                          </div>

                          <div class="form-group">
                              <label for="email_company">Email</label>
                              <input type="email" class="form-control" id="email_company" name="email_company" value = "{{old('email_company', $master_companys->email_company)}}" placeholder="Input email perusahaan" required>
                          </div>

                          <div class="form-group">
                              <label for="map_company">Emblem Map</label>
                              <Textarea class="form-control" rows="2" id="map_company" name="map_company" placeholder="Input emblem map" required>{{old('map_company', $master_companys->map_company)}}</Textarea>
                          </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                          <span> Save Changes</span>
                        </button>
                      </div>

                  </div>
                  <!--/.col (left) -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>
</form>

