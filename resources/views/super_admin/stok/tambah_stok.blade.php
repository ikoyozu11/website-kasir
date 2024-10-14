@extends('super_admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="wrapper">
                <form method="POST" action="/super_admin/stok/tambah" id="contactForm" name="contactForm" class="contactForm">
                    @csrf
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                              <label class="label" for="nama_barang">Barang</label>
                              <select class="form-control" name="id_barang" aria-label="Default select example">
                                  <option value="">Pilih Barang</option>
                                  @foreach ($barang as $item)
                                      <option value="{{$item['id_barang']}}">{{$item['nama_barang']}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="stok">Stok Barang</label>
                                <input type="number" min="0" class="form-control" name="stok" id="stok" placeholder="Stok Barang" value="{{ old('stok') }}">
                                @error('stok')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal_masuk" class="form-control datetimepicker-input" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8"><br>
                            <div class="form-group">
                                <input type="submit" value="Tambah" class="btn btn-primary">
                                <input type="submit" value="Batal" class="btn btn-danger">
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </section>
@endsection
@section('extra-js')
<script>

  //Date picker
  $('#reservationdate').datetimepicker({
      format: 'L'
  });
  </script>
@endsection

    