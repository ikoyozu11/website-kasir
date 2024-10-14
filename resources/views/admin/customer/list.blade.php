@extends('admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <form style="text-align: right" action="/admin/customer/tambah" method="get">
                        <button type="submit">Tambah customer</button>
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
                            <th style="font-weight: bold">Nama customer</th>
                            <th style="font-weight: bold">Alamat customer</th>
                            <th style="font-weight: bold">Email customer</th>
                            <th style="font-weight: bold">Telp customer</th>
                            <th style="font-weight: bold">Status</th>
                            <th style="width: 20%; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_customer }}</td>
                                    <td>{{ $item->alamat_customer }}</td>
                                    <td>{{ $item->email_customer }}</td>
                                    <td>{{ $item->telp_customer }}</td>
                                    @if ($item->status_customer == 1)
                                        <td>Aktif</td>
                                    @else
                                        <td>Non-Aktif</td>
                                    @endif
                                    <td style="text-align: center">
                                        <a href="{{ route('admin.ubah_customer', $item->id_customer) }}" class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @if ($item->status_customer == 1)
                                            <form action="{{ route('customer.destroy', $item->id_customer) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        @else
                                            <form action="{{ route('customer.restore', $item->id_customer) }}" method="POST" style="display:inline">
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
	


