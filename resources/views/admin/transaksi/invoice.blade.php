@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1 class="text-center">INVOICE</h1>
    <h2 class="text-center">Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</h2>

    <div class="row">
        <div class="col-md-6">
            <h4>Nama Customer: {{ $transaksi->customer->nama_customer }}</h4>
        </div>
    </div>

    <table id="dataTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->detail as $item)
            <tr>
                <td>{{ $item->stok->barang->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ App\CurrencyHelper::formatCurrency($item->stok->harga_barang_jual, 2) }}</td>
                <td>{{ App\CurrencyHelper::formatCurrency($item->sub_total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">Total Pembelian</th>
                <th>{{ App\CurrencyHelper::formatCurrency($transaksi->total_transaksi, 2) }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
