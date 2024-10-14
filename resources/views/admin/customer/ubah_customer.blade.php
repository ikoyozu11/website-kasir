@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="wrapper">
        <form method="POST" action="{{ route('admin.ubah_customer', $customer->id_customer) }}" id="contactForm" name="contactForm" class="contactForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="nama_customer">Nama</label>
                        <input type="text" class="form-control" name="nama_customer" id="nama_customer" value="{{ $customer->nama_customer }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="alamat_customer">Alamat</label>
                        <input type="text" class="form-control" name="alamat_customer" id="alamat_customer" value="{{ $customer->alamat_customer }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="email_customer">Email</label>
                        <input type="text" class="form-control" name="email_customer" id="email_customer" value="{{ $customer->email_customer }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="telp_customer">Telp</label>
                        <input type="text" class="form-control" name="telp_customer" id="telp_customer" value="{{ $customer->telp_customer }}">
                    </div>
                </div>
                
                <div class="col-md-8"><br>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                        <div class="submitting"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                
@endsection
    