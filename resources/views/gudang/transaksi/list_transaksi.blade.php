@extends('gudang.dashboard')
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
                                            <td>
                                                <form action="{{ route('gudang.transaksi.viewDetail', $item->id_transaksi_header) }}" method="get">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Tombol Transaksi">
                                                    @if ($item->status_transaksi == 1)
                                                        <form action="{{ route('gudang.transaksi.konfirmasi', $item->id_transaksi_header) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                        </form>
                                                        <form action="{{ route('gudang.transaksi.batal', $item->id_transaksi_header) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="deskripsi" id="deskripsi">
                                                            <button class="btn btn-danger delete-transaction"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                                
                                    
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
    </div>
@endsection
@section('extra-js')
<script>
    $(document).ready(function() {
        $('.delete-transaction').click(function() {
            var transactionId = $(this).data('id');
            var description = prompt("Masukkan deskripsi pembatalan:");
            $('#deskripsi').val(description)
        });
    });
</script>
@endsection