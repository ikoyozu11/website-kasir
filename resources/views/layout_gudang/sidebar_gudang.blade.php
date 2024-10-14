<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Selamat Datang, Gudang</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="{{ route('gudang.transaksi')}}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>List Pesanan</p>
              </a>
          </li>
          {{-- <li class="nav-item">
              <a href="{{ route('gudang.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Barang</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('gudang.stok') }}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Stok</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('gudang.tambah_barang') }}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Tambah Barang</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('gudang.transaksi') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Transaksi</p>
              </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>