@extends('admin.dashboard')
@section('content')
    <div class="container">
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
                                        <th style="font-weight: bold">Status Transaksi</th>
                                        <th style="font-weight: bold">Deskripsi Transaksi</th>
                                        <th style="font-weight: bold">View</th>
                                        <th style="font-weight: bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trans as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->customer["nama_customer"] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item["tanggal_transaksi"])->format('d-m-Y') }}</td>
                                            <td>{{ App\CurrencyHelper::formatCurrency($item["total_transaksi"]) }}</td>

                                            @if ($item->status_transaksi == 1)
                                                <td>Menunggu Gudang</td>
                                            @elseif($item->status_transaksi == 2)
                                                <td>Menunggu Pembayaran</td>
                                            @elseif($item->status_transaksi == 3)
                                                <td>Selesai</td>
                                            @else
                                                <td>Batal</td>
                                            @endif
                                            <td>{{ $item["deskripsi"] }}</td>
                                            <td>
                                                <form action="{{ route('admin.transaksi.viewDetail', $item->id_transaksi_header) }}" method="get">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            @if ($item->status_transaksi != 0)
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Tombol Transaksi">
                                                        @if($item->status_transaksi == 2)
                                                            <form action="{{ route('admin.transaksi.bayar', $item->id_transaksi_header) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i></button>
                                                            </form>
                                                        @elseif ($item->status_transaksi == 3)
                                                            <form action="{{ route('generate.invoice', $item->id_transaksi_header) }}" method="get">
                                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                            </form>
                                                        @endif
                                                        <form action="{{ route('gudang.transaksi.batal', $item->id_transaksi_header) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="dibatalkan oleh admin" name="deskripsi" id="deskripsi">
                                                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif

                                        </tr>
                                        {{-- <tr>
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
                                        </tr> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
