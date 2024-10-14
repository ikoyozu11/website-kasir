@include('layout_admin.header_admin')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Admin</a>
        </li>
      </ul>
    </nav>

    @include('layout_admin.sidebar_admin')
    
    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('layout_gudang.footer_gudang')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $('#dataTable').DataTable({
            responsive: true 
        });
    </script>
    @yield('extra-js')
</body>
