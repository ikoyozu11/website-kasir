@extends('super_admin.dashboard')

@section('content')
    <div class="container"><br>
        <h1>Laporan Penjualan Harian</h1><br>
        <form method="GET" action="{{ route('report.harian') }}">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $tanggal->format('Y-m-d') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form><br>

        <div class="table-responsive">
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Waktu</th> --}}
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>
                        {{-- <th>Pembayaran</th> --}}
                        <th>HPP</th>
                        <th>Untung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td>{{ $item['waktu'] }}</td> --}}
                            <td>{{ $item['barang'] }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                            <td>{{ App\CurrencyHelper::formatCurrency($item['harga_jual']) }}</td>
                            {{-- <td>{{ $item['pembayaran'] }}</td> --}}
                            <td>{{ App\CurrencyHelper::formatCurrency($item['hpp']) }}</td>
                            <td>{{ App\CurrencyHelper::formatCurrency($item['untung']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total Penjualan</th>
                        <th>{{ App\CurrencyHelper::formatCurrency($totalPenjualan) }}</th>
                        {{-- <th colspan="1">Total HPP</th> --}}
                        <th>{{ App\CurrencyHelper::formatCurrency($totalHpp) }}</th>
                        <th colspan="1"></th>
                    </tr>
                    <tr>
                        <th colspan="5">Total Untung</th>
                        <th colspan="2">{{ App\CurrencyHelper::formatCurrency($totalUntung) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "autoWidth": false,
                "responsive": true,
                "order": [[0, 'asc']],
                "columnDefs": [
                    { "width": "5%", "targets": 0 },
                    { "width": "10%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "10%", "targets": 3 },
                    { "width": "15%", "targets": 4 },
                    { "width": "10%", "targets": 5 },
                    { "width": "15%", "targets": 6 },
                    { "width": "15%", "targets": 7 },
                ]
            });
        });
    </script>
@endsection
