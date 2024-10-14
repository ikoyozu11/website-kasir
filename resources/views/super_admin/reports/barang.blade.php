@extends('super_admin.dashboard')

@section('content')
<div class="container"><br>
    <h1 class="text-center">LAPORAN STOK BULANAN</h1>
    <form method="GET" action="{{ route('report.pemasukan_pengeluaran_barang') }}" class="mb-4">
        <div class="form-row align-items-end">
            <div class="col">
                <label for="bulan">Bulan</label>
                <select class="form-control" id="bulan" name="bulan" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                    @endfor
                </select>
            </div>
            <div class="col">
                <label for="tahun">Tahun</label>
                <select class="form-control" id="tahun" name="tahun" required>
                    @for ($i = now()->year; $i >= 2000; $i--)
                        <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>

    <h2 class="text-center">BULAN {{ \Carbon\Carbon::create($tahun, $bulan, 1)->format('F Y') }}</h2>
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Barang</th>
                {{-- <th>Stok Awal</th> --}}
                <th colspan="2">Jumlah Barang</th>
                <th>Stok Akhir</th>
            </tr>
            <tr>
                <th></th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanStok as $index => $data)
            <tr>
                <td>{{ $data['nama_barang'] }}</td>
                {{-- <td>{{ $data['stok_awal'] }}</td> --}}
                <td>{{ $data['barang_masuk'] }}</td>
                <td>{{ $data['barang_keluar'] }}</td>
                <td>{{ $data['stok_akhir'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
