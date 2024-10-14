@extends('super_admin.dashboard')
@section('content')
<div class="container">
    <div class="wrapper">
        <form method="POST" action="{{ route('super_admin.ubah_kategori', $kategori->id_kategori) }}" id="contactForm" name="contactForm" class="contactForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="nama_kategori">Nama</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}">
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
    