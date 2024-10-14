@extends('super_admin.dashboard')

@section('content')
<div class="container"><br>
    <h1 class="text-center">NERACA</h1><br>
    <form method="GET" action="{{ route('report.neracaBulanan') }}" class="mb-4">
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

    <h2 class="text-center">Bulan {{ \Carbon\Carbon::create($tahun, $bulan, 1)->format('F Y') }}</h2><br>
    <table id="dataTable" class="table table-striped">
        <thead>
            <tr>
                <th>Perkiraan / Akun</th>
                <th>Debet</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($neraca as $item)
            <tr>
                <td>{{ $item['akun'] }}</td>
                <td class="text-right">{{ number_format($item['debet'], 0, ',', '.') }}</td>
                <td class="text-right">{{ number_format($item['kredit'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td><strong>Jumlah</strong></td>
                <td class="text-right"><strong>{{ number_format($totalDebet, 0, ',', '.') }}</strong></td>
                <td class="text-right"><strong>{{ number_format($totalKredit, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
