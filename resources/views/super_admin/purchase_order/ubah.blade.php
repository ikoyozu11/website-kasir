@extends('super_admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <form style="text-align: right" action="/super_admin/barang/tambah" method="get"> --}}
                        <button id="ubahOrder" type="submit">Ubah</button>
                        {{-- <input type="hidden" id="id_supplier" value="{{$id_supplier}}"> --}}
                    {{-- </form> --}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                            <th style="font-weight: bold">No</th>
                            <th style="font-weight: bold">Nama Barang</th>
                            <th style="font-weight: bold">Jumlah Barang</th>
                            <th style="font-weight: bold">Harga Beli Barang</th>
                            <th style="font-weight: bold">Sub Total</th>
                            {{-- <th style="width: 20%; font-weight: bold">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $index => $item)
                                <tr data-id="{{ $item->id_purchasing_order_detail }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->barang["nama_barang"] }}</td>
                                    <td>
                                        <input type="number" min="0" value="{{ $item->jumlah_barang }}" class="form-control jumlah_barang" data-index="{{ $index }}" name="jumlah_barang" placeholder="Jumlah Barang">
                                    </td>
                                    <td>
                                        <input type="number" min="0" value="{{ $item->harga_barang }}" class="form-control harga_barang" data-index="{{ $index }}" name="harga_barang" placeholder="Harga Barang">
                                    </td>
                                    <td>
                                        <input type="number" min="0" value="{{ $item->sub_total }}" class="form-control sub_total" data-index="{{ $index }}" name="sub_total" placeholder="Sub Total" disabled>
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
        $('.jumlah_barang, .harga_barang').on('keyup', function() {
            var index = $(this).data('index');
            var jumlah = parseFloat($('.jumlah_barang[data-index="'+index+'"]').val());
            var harga = parseFloat($('.harga_barang[data-index="'+index+'"]').val());
            var subtotal = jumlah * harga || 0;
            $('.sub_total[data-index="'+index+'"]').val(subtotal);
        });

        $('#ubahOrder').on('click', function() {
            var data = [];
            var total = 0;
            $('#dataTable tbody tr').each(function(index, tr) {
                var jumlah = parseFloat($(tr).find('.jumlah_barang').val()) || 0;
                var harga = parseFloat($(tr).find('.harga_barang').val()) || 0;
                var sub_total = parseFloat($(tr).find('.sub_total').val()) || 0;
                var rowData = {
                    'id': $(tr).data('id'),
                    'jumlah_barang': jumlah,
                    'harga_barang': harga,
                    'sub_total': sub_total
                };
                data.push(rowData);
                total += sub_total;
            });

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route("po.update") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'data': data,
                    'id': {{$id}},
                    'total': total
                },
                success: function(response) {
                    // Tampilkan pesan sukses atau lakukan tindakan lainnya
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error atau lakukan penanganan error lainnya
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection

