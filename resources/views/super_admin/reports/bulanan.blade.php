@extends('super_admin.dashboard')

@section('content')
<div class="container"><br>
    <h1 class="text-center">LAPORAN LABA RUGI</h1><br>
    <form method="GET" action="{{ route('report.bulanan') }}" class="mb-4">
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

    <h2 class="text-center">Bulan {{ \Carbon\Carbon::create($tahun, $bulan, 1)->format('F Y') }}</h2>
    <table id="dataTable" class="table table-striped">
        <tbody>
            <tr>
                <td>Biaya Tetap Bulanan</td>
                <td class="text-right">{{ number_format($totalBiayaOperasional, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Penjualan Material</td>
                <td class="text-right">{{ number_format($totalOmzetPenjualan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>HPP Total</td>
                <td class="text-right">{{ number_format($totalHPP, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><b>Laba Kotor</b></td>
                <td class="text-right"><b>{{ number_format($labaKotor, 0, ',', '.') }}</b></td>
            </tr>
            <tr>
                <td><b>Laba Bersih</b></td>
                <td class="text-right"><b>{{ number_format($labaBersih, 0, ',', '.') }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
