@extends('super_admin.dashboard')
@section('content')
    <br>
        <div class="container">
            <div class="wrapper">
                <form method="POST" action="{{ route('super_admin.tambah_barang') }}" id="contactForm" name="contactForm" class="contactForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="nama_barang">Kategori</label>
                                <select class="form-control" name="id_kategori" aria-label="Default select example">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{$item['id_kategori']}}">{{$item['nama_kategori']}}</option>
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
                                        <option value="{{$item['id_supplier']}}">{{$item['nama_supplier']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="nama_barang">Nama</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}">
                                @error('nama_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="harga_barang">Harga</label>
                                <input type="text" class="form-control" name="harga_barang" id="harga_barang" placeholder="Harga Barang" value="{{ old('harga_barang') }}">
                                @error('harga_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="jumlah_masuk">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk" placeholder="Jumlah Barang Masuk" value="{{ old('jumlah_masuk') }}">
                                @error('jumlah_masuk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Barang Masuk" value="{{ old('tanggal_masuk') }}">
                                @error('tanggal_masuk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-8"><br>
                            <div class="form-group">
                                <input type="submit" value="Tambah" class="btn btn-primary">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
    