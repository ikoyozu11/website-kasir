@extends('admin.dashboard')
@section('content')
    <br>
        <div class="container">
            <div class="wrapper">
                <form method="POST" action="/admin/customer/tambah" id="contactForm" name="contactForm" class="contactForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="nama_customer">Nama</label>
                                <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama customer" value="{{ old('nama_customer') }}">
                                @error('nama_customer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="alamat_customer">Alamat</label>
                                <input type="text" class="form-control" name="alamat_customer" id="alamat_customer" placeholder="Alamat customer" value="{{ old('alamat_customer') }}">
                                @error('alamat_customer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="email_customer">Email</label>
                                <input type="text" class="form-control" name="email_customer" id="email_customer" placeholder="Email customer" value="{{ old('email_customer') }}">
                                @error('email_customer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="label" for="telp_customer">Telepon</label>
                                <input type="text" class="form-control" name="telp_customer" id="telp_customer" placeholder="Telepon customer" value="{{ old('telp_customer') }}">
                                @error('telp_customer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
    