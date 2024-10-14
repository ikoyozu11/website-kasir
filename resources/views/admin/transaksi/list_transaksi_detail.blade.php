@extends('admin.dashboard')
@section('content')
    <div class="container">
        <section class="ftco-section">
            <div class="container"><br>

                <button onclick="window.history.back()">Back</button>
                <br><br>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table id="dataTable" class="table table-striped">
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
                                    @foreach ($trans as $i => $d)
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection