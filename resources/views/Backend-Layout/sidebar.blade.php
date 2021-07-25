<?php
  $akses = Auth::user()->hak_akses;
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      {{-- arahkan ke AdminLTE --}}
      <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIREMPONG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          {{-- <li class="nav-item has-treeview menu-open">
            <a id="dashboard" href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> --}}
        
          {{-- jika akses 1 = admin --}}
          @if ($akses == "1")
            {{-- <li id="xcomppany" class="nav-header"></li> --}}
            <li id="tcomppany" class="nav-item">
              <a id="company" href="/master/company" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            
            <li id="xmaster" class="nav-item has-treeview">
              <a id="tmaster" href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a id="admin" href="/master/admin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admin</p>
                  </a>
                </li> 
            
                <li class="nav-item">
                    <a id="user" href="/master/user" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User</p>
                    </a>
                </li> 

                <li class="nav-item">
                    <a id="jenis" href="/master/jenis" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jenis Product</p>
                    </a>
                </li>               

                <li class="nav-item">
                    <a id="product" href="/master/product" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Products</p>
                    </a>
                </li>               

                <li class="nav-item">
                  <a id="bank" href="/master/bank" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bank</p>
                  </a>
                </li>               

              </ul>
            </li>              

            <li id="xtransaksi" class="nav-item has-treeview">
              <a id="ttransaksi" href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a id="list_transaksi" href="/transaksi/admin/list-transaksi/home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Transaksi</p>
                  </a>
                </li> 

                <li class="nav-item">
                  <a id="list_sewa" href="/transaksi/admin/list-sewa/home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Sewa</p>
                  </a>
                </li> 
                
              </ul>
            </li>              

          @endif

          {{-- jika aksesnya adalah user --}}
          @if ($akses == "2")

            <li class="nav-item">
              <a id="transaksi_sewa" href="/transaksi/sewa/create" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>List Products</p>
              </a>
            </li>            

            <li class="nav-item">
              <a id="transaksi_list" href="/transaksi/sewa/home" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>List Transaksi</p>
              </a>
            </li>

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>