@extends('super_admin.dashboard')
@section('content')
<section class="ftco-section">
    <div class="container"><br>
        <div class="row">
            <div class="col-12">
                {{-- <form style="text-align: right" action="/super_admin/barang/tambah" method="get"> --}}
                    <button id="orderBarang" type="submit">Order Barang</button>
                    <input type="hidden" id="id_supplier" value="{{$id_supplier}}">
                {{-- </form> --}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2>{{$barang[0]->supplier["nama_supplier"]}}</h2>
            </div>
            <div class="col-md-6">
                <h4>Total Harga :
                    <input type="text" disabled value="0" class="form-control totalHarga" name="totalHarga" id="totalHarga">
                </h4>
                
            </div>
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="dataTable" class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th style="font-weight: bold">No</th>
                            <th style="font-weight: bold">Nama Barang</th>
                            <th style="font-weight: bold">Kategori Barang</th>
                            {{-- <th style="font-weight: bold">Status</th> --}}
                            <th style="width: 10%; font-weight: bold">Jumlah</th>
                            <th style="width: 10%; font-weight: bold">Harga</th>
                            <th style="width: 30%; font-weight: bold">Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($barang as $index => $item)
                            <tr data-id="{{ $item->id_barang}}">
                                <td style="text-align: right; align-items: center">
                                    <input type="checkbox" class="form-check-input checkbox" id="checkbox{{ $item->id }}">
                                </td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{$item->kategori["nama_kategori"]}}</td>
                                {{-- @if ($item->status == 1  )
                                    <td>Aktif</td>
                                @else
                                    <td>Non-Aktif</td>
                                @endif --}}
                                
                                <td style="text-align: center">
                                    <input type="number" min="0" class="form-control jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" style="display: none">
                                </td>
                                <td style="text-align: center">
                                    <input type="number" min="0" class="form-control harga_barang" name="harga_barang" placeholder="Harga Barang" style="display: none">
                                </td>
                                <td style="text-align: center">
                                    <input type="number" min="0" value="0" disabled class="form-control sub_total" name="sub_total" style="display: none">
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
@section('extra-js')
    <script>
        $(document).ready(function() {

            var total = 0;

            $(".checkbox").change(function() {
                var $tr = $(this).closest('tr');
                var $jumlahInput = $tr.find(".jumlah_barang");
                var $hargaInput = $tr.find(".harga_barang");
                var $subTotal = $tr.find(".sub_total");

                if ($(this).is(":checked")) {
                    $jumlahInput.show();
                    $hargaInput.show();
                    $subTotal.show();
                } else {
                    $jumlahInput.hide();
                    $hargaInput.hide();
                    $subTotal.hide();
                }
            });
            
            $(".jumlah_barang, .harga_barang").on('keyup', function() {
                var jumlah = 0;
                var harga = 0;
                var subTotal = 0;
                var total = 0;
                var cek = 0
                var formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                $(".checkbox:checked").each(function() {
                    var $tr = $(this).closest('tr');
                    jumlah = parseInt($tr.find(".jumlah_barang").val()) || 0;;
                    harga = parseInt($tr.find(".harga_barang").val()) || 0;;
                    subTotal = parseInt($tr.find(".sub_total").val()) || 0;;
                    
                    total = jumlah * harga
                    var formattedTotal = formatter.format(total);
                    
                    $tr.find(".sub_total").val(total) 
                    
                    
                });
                var allSubTotalValues = getAllSubTotalValues();
                allSubTotalValues.forEach(e => {
                    cek = cek + e
                });
                var formattedTotal = formatter.format(cek);
                $("#totalHarga").val(formattedTotal)
                
            });

            function getAllSubTotalValues() {
                var subTotalValues = $(".sub_total").map(function() {
                    return parseFloat($(this).val()) || 0;
                }).get();

                return subTotalValues;
            }

            function getDataToSubmit() {
                var dataToSubmit = [];

                $(".checkbox:checked").each(function() {
                    var $row = $(this).closest('tr');
                    var idBarang = $row.data('id');
                    var jumlah = parseInt($row.find(".jumlah_barang").val()) || 0;
                    var harga = parseInt($row.find(".harga_barang").val()) || 0;

                    dataToSubmit.push({
                        id_barang: idBarang,
                        jumlah_barang: jumlah,
                        harga_barang: harga
                    });
                });

                return dataToSubmit;
            }

            // Event listener saat tombol kirim data ditekan
            $("#orderBarang").click(function() {
                var data = getDataToSubmit();
                var totalHarga = $("#totalHarga").val()
                var cleanedValue = totalHarga.replace(/[^\d,]/g, '');
                var floatValue = parseFloat(cleanedValue.replace(',', '.'));
                var id_supplier = $("#id_supplier").val()
                $.ajax({
                    url: '/super_admin/supplier/order/tambah',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        dataToSubmit: data,
                        id_supplier: id_supplier,
                        total_harga: floatValue,
                    },
                    success: function(response) {
                        // Tindakan setelah permintaan berhasil
                        alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        // Tindakan jika terjadi kesalahan
                        alert(error.message);
                    }
                });
            });
            });
    </script>
@endsection
	


