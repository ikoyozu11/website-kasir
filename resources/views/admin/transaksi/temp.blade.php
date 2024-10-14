@extends('admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold">No</th>
                                    <th style="font-weight: bold">Nama Customer</th>
                                    <th style="font-weight: bold">Tanggal Transaksi</th>
                                    <th style="font-weight: bold">Total Transaksi</th>
                                    <th style="font-weight: bold">Aksi</th>
                                    <th>List Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($temp as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->customer["nama_customer"] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item["tanggal_transaksi"])->format('d-m-Y') }}</td>
                                        <td>{{ App\CurrencyHelper::formatCurrency($item["total_transaksi"]) }}</td>
                                        <td>
                                            <form action="{{ route('admin.transaksi.konfirmasi', $item->id_transaksi_header) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </form>

                                            <form action="{{ route('admin.transaksi.batal', $item->id_transaksi_header) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td colspan="5">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: bold">No</th>
                                                        <th style="font-weight: bold">Nama Barang</th>
                                                        <th style="font-weight: bold">Jumlah Barang</th>
                                                        <th style="font-weight: bold">Harga Barang</th>
                                                        <th style="font-weight: bold">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->detail as $i => $d)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $d->stok->barang["nama_barang"] }}</td>
                                                            <td>{{ $d["jumlah"] }}</td>
                                                            <td>{{ App\CurrencyHelper::formatCurrency($d->stok["harga_barang_jual"]) }}</td>
                                                            <td>{{ App\CurrencyHelper::formatCurrency($d["sub_total"]) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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