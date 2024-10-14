@extends('admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <button id="btnPesan" type="submit">Pesan</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="customer">Pilih Customer:</label>
                    <select class="form-control" id="customer" name="customer">
                        <option value="">Pilih Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id_customer }}">{{ $customer->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                            <th></th>
                            <th style="font-weight: bold">No</th>
                            <th style="font-weight: bold">Nama Barang</th>
                            <th style="font-weight: bold">Stok</th>
                            <th style="font-weight: bold">Harga Barang</th>
                            <th style="font-weight: bold">Qty</th>
                            <th style="font-weight: bold">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stok as $index => $item)
                                <tr data-id="{{ $item->id_stok }}">
                                    <td style="text-align: right">
                                        <input type="checkbox" class="form-check-input pesan" data-index="{{ $index }}">
                                    </td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->barang["nama_barang"] }}</td>
                                    <td  class="stok">{{ $item->po["jumlah_barang"] }}</td>
                                    <td>{{ $item->harga_barang_jual }}</td>
                                    <td>
                                        <input type="number" min="0" class="form-control qty" data-index="{{ $index }}" name="qty" placeholder="0" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control subtotal" data-index="{{ $index }}" placeholder="Subtotal" readonly>
                                    </td>
                                    <input type="hidden" class="id_po" value="{{ $item->po["id_purchasing_order_detail"] }}">
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
        // Ketika checkbox diubah
        $('.pesan').on('change', function() {
            var index = $(this).data('index');
            var qtyInput = $('.qty[data-index="' + index + '"]');
            var subtotalInput = $('.subtotal[data-index="' + index + '"]');
            var hargaJual = parseFloat($(this).closest('tr').find('td:eq(4)').text());

            // Jika checkbox diceklis, aktifkan input qty
            if ($(this).is(':checked')) {
                qtyInput.prop('disabled', false);
            } else {
                qtyInput.prop('disabled', true).val('');
                subtotalInput.val('');
            }
        });

        // Ketika nilai qty diubah
        $('.qty').on('input', function() {
            var index = $(this).data('index');
            var qty = $(this).val();
            var stok = parseFloat($(this).closest('tr').find('.stok').text());

            // Cek apakah qty melebihi stok
            if (parseFloat(qty) > stok) {
                alert('Stok barang tidak mencukupi');
                $(this).val(stok); // Reset nilai qty menjadi nilai stok yang tersedia
            }

            var hargaJual = parseFloat($(this).closest('tr').find('td:eq(4)').text());
            var subtotalInput = $('.subtotal[data-index="' + index + '"]');
            var subtotal = qty * hargaJual;

            // Set nilai subtotal
            subtotalInput.val(subtotal);
        });

        function hitungTotalSubtotal() {
            var totalSubtotal = 0;
            $('.subtotal').each(function() {
                var subtotal = parseFloat($(this).val());
                if (!isNaN(subtotal)) {
                    totalSubtotal += subtotal;
                }
            });
            return totalSubtotal;
        }

        // Ketika tombol Pesan ditekan
        $('#btnPesan').on('click', function() {
            var customer = $('#customer').val();
            if (!customer) {
                alert('Silakan pilih customer terlebih dahulu');
                return false; // Berhenti jika customer belum dipilih
            }
            var pesanan = [];
            var totalSubtotal = hitungTotalSubtotal();
            // Loop melalui setiap baris yang dicentang
            $('.pesan:checked').each(function(index, checkbox) {
                var rowIndex = $(checkbox).data('index');
                var qty = $('.qty[data-index="' + rowIndex + '"]').val();
                var idPo = $('.id_po[data-index="' + rowIndex + '"]').val();
                var idStok = $(checkbox).closest('tr').data('id'); // Ambil ID dari data-id pada <tr>
                var subtotal = $('.subtotal[data-index="' + rowIndex + '"]').val();
                
                pesanan.push({
                    id_stok: idStok, // Tambahkan ID stok ke dalam data pesanan
                    id_po: idPo,
                    qty: qty,
                    subtotal: subtotal
                });
            });

            // Kirim data pesanan ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.buat_pesanan") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'pesanan': pesanan,
                    'customer': $('#customer').val(),
                    'totalSubtotal': totalSubtotal
                },
                success: function(response) {
                    // Tampilkan pesan sukses atau lakukan tindakan lainnya
                    alert(response.message)
                    window.location.assign("/admin/transaksi/temp");
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