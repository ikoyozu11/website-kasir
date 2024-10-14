@extends('super_admin.dashboard')
@section('content')
<section class="ftco-section">
    <div class="container"><br>
        <div class="row">
            <div class="col-12">
                <form style="text-align: right" action="/super_admin/barang/tambah" method="get">
                    <button type="submit">Tambah Barang</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="dataTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="font-weight: bold">No</th>
                          <th style="font-weight: bold">Nama Barang</th>
                          <th style="font-weight: bold">Kategori Barang</th>
                          <th style="font-weight: bold">Supplier Barang</th>
                          <th style="font-weight: bold">Status</th>
                          <th style="width: 20%; font-weight: bold">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($barang as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{$item->kategori["nama_kategori"]}}</td>
                                <td>{{$item->supplier["nama_supplier"]}}</td>
                                @if ($item->status == 1  )
                                    <td>Aktif</td>
                                @else
                                    <td>Non-Aktif</td>
                                @endif
                                <td style="text-align: center">
                                    <a href="{{ route('super_admin.ubah_barang', $item->id_barang) }}" class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    @if ($item->status == 1 )
                                        <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('barang.restore', $item->id_barang) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
	


