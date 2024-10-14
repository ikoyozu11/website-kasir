@extends('super_admin.dashboard')
@section('content')
<div class="container">
    <div class="wrapper">
        <form method="POST" action="{{ route('super_admin.ubah_supplier', $supplier->id_supplier) }}" id="contactForm" name="contactForm" class="contactForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="nama_supplier">Nama</label>
                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="{{ $supplier->nama_supplier }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="alamat_supplier">Alamat</label>
                        <input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier" value="{{ $supplier->alamat_supplier }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="email_supplier">Email</label>
                        <input type="text" class="form-control" name="email_supplier" id="email_supplier" value="{{ $supplier->email_supplier }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="telp_supplier">Telp</label>
                        <input type="text" class="form-control" name="telp_supplier" id="telp_supplier" value="{{ $supplier->telp_supplier }}">
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
    