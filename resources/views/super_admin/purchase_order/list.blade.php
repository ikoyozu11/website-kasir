@extends('super_admin.dashboard')
@section('content')
    <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                            <th style="font-weight: bold">No</th>
                            <th style="font-weight: bold">Nama Supplier</th>
                            <th style="font-weight: bold">Tanggal Order</th>
                            <th style="font-weight: bold">Total Order</th>
                            <th style="font-weight: bold">Status Order</th>
                            <th style="width: 20%; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->supplier["nama_supplier"] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_order)->format('d-m-Y') }}</td>
                                    
                                    <td>{{ App\CurrencyHelper::formatCurrency($item->total_order) }}</td>
                                    @if ($item->status_order == 1)
                                        <td>Selesai</td>
                                    @else
                                        <td>Menunggu</td>
                                    @endif
                                    <td style="text-align: center">
                                        <a href="{{ route('po.ubah', $item->id_purchasing_order_header) }}" class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        {{-- @if ($item->status_order == 1)
                                            <form action="{{ route('po.destroy', $item->id_purchasing_order_header) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        @else
                                            <form action="{{ route('po.restore', $item->id_purchasing_order_header) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </form>
                                        @endif --}}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
	


