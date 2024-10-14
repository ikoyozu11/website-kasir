@extends('super_admin.dashboard')
@section('content')
            <div class="container">
                <div class="wrapper">
                    <form method="POST" action="{{ route('super_admin.ubah_barang', $barang->id_barang) }}" id="contactForm" name="contactForm" class="contactForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="label" for="nama_barang">Kategori</label>
                                    <select class="form-control" name="id_kategori" aria-label="Default select example">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            @if ($barang->id_kategori == $item['id_kategori'])
                                                <option selected value="{{$item['id_kategori']}}">{{$item['nama_kategori']}}</option>
                                            @else
                                                <option value="{{$item['id_kategori']}}">{{$item['nama_kategori']}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="label" for="nama_barang">Supplier</label>
                                    <select class="form-control" name="id_supplier" aria-label="Default select example">
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($supplier as $item)
                                            @if ($barang->id_supplier == $item['id_supplier'])
                                                <option selected value="{{$item['id_supplier']}}">{{$item['nama_supplier']}}</option>
                                            @else
                                                <option value="{{$item['id_supplier']}}">{{$item['nama_supplier']}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="label" for="nama_barang">Nama</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}">
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
@endsection