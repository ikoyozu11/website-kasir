@include('layout_gudang.header_gudang')

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  @include('layout_gudang.sidebar_gudang')

  <div class="content-wrapper"><br>
  <section class="ftco-section">
            <div class="container">
                <div class="wrapper">
                    <form method="POST" action="{{ route('gudang.ubah_stok', $stok->id_stok) }}" id="contactForm" name="contactForm" class="contactForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="label" for="nama_barang">Barang</label>
                                    <select class="form-control" name="id_barang" aria-label="Default select example">
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $item)
                                            @if ($stok->id_barang == $item["id_barang"])
                                                <option selected value="{{$item['id_barang']}}">{{$item['nama_barang']}}</option>
                                            @else
                                                <option value="{{$item['id_barang']}}">{{$item['nama_barang']}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <label class="label" for="stok">Stok Barang</label>
                                      <input type="number" min="0" value="{{$stok["stok"]}}" class="form-control" name="stok" id="stok" placeholder="Stok Barang">
                                  </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label>Date:</label>
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" value="{{$tanggal}}" name="tanggal_masuk" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-8"><br>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <input type="submit" value="Batal" class="btn btn-danger">
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
  </div>

  @include('layout_gudang.footer_gudang')
</body>

<script>

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
    