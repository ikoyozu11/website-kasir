@extends('gudang.dashboard')
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $i => $d)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $d->stok->barang["nama_barang"] }}</td>
                                            <td>{{ $d["jumlah"] }}</td>
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