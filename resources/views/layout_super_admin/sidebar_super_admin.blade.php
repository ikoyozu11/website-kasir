<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Selamat Datang, Super Admin</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MASTER</li>
            <li class="nav-item">
              <a href="{{ route('super_admin.supplier') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('super_admin.kategori') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Kategori</p>
              </a>
             </li>
            <li class="nav-item">
              <a href="{{ route('super_admin.barang') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Barang</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('super_admin.po') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Purchase Order History</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('super_admin.stok') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Stok dan harga</p>
              </a>
            </li>


            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
              <a href="{{ route('report.harian') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Transaksi Harian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('report.bulanan') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Laba Rugi Bulanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('report.neracaBulanan') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Neraca</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('report.pemasukan_pengeluaran_barang') }}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Keluar Masuk Barang</p>
              </a>
            </li>

            <!-- <li class="nav-header">PENGGUNA</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Daftar Pengguna</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-circle"></i>
               <p>Tambah Pengguna</p>
             </a>
            </li> -->
            <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>
