@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body py-5">

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <div id="qr-reader" style="width:250px"></div>
                    <div id="qr-reader-results"></div>

                </div>
            </div>


            <form action="">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">


                        {{-- <button class="btn  btn-sm btn-secondary" type="submit" id="submit"><i
                                class="fa flaticon-refresh"></i></button> --}}



                    </div>

                    <div id="chooseItem">




                    </div>


                </div>
            </form>

            <div class="m-portlet__body" style=" height: auto;text-align: left; padding-top: 5px">
                <table border="0px" width="100%">


                    <tr>
                        <td style="width:25px">Status</td>
                        <td style="width:2px">:</td>
                        <td>
                            <div class="status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Info</td>
                        <td>:</td>
                        <td>
                            <div class="message"></div>
                        </td>
                    </tr>




                </table>
                <hr style="margin: 5px 5px 5px 5px">
                <table border="0px" width="100%">

                    <tr>
                        <th colspan="4" style="text-align: center"><span id="pelanggan">Data
                                Pelanggan</span> </th>
                    </tr>
                    <tr>
                        <td style="width:25px">Nama</td>
                        <td style="width:2px">:</td>
                        <td>
                            <div class="nama"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Telpon</td>
                        <td>:</td>
                        <td>
                            <div class="telpon"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align:top">Jasa</td>
                        <td style=" vertical-align:top">:</td>
                        <td>
                            <div class="jasa"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>
                            <div class="total"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <div class="pembayaran"></div>
                        </td>
                    </tr>




                </table>
            </div>
        </div>
    </div>



    </div>
    </div>
@endsection




@push('scripts')
    {{-- <script src="https://unpkg.com/html5-qrcode"></script> --}}

    <script src="{{ base_url() }}/assets/js/html5-qrcode.js"></script>

    <script type="text/javascript">
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;



        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                // alert(`Scan result ${decodedText}`, decodedResult);
                var idTransaksi = $('#item').val();
                console.log(idTransaksi);
                $.ajax({
                    url: base_url() + "/scanner/checkScanType",
                    method: "POST",
                    data: {

                        content: lastResult,
                        idTransaksi: idTransaksi,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('.kode_barang').html(lastResult);

                        if (data == false) {
                            $('.status').html('Qrcode Tidak Dikenali!');
                        } else {
                            if (data.jumlah_data > 1) {

                                if (idTransaksi == null) {
                                    $('#chooseItem').show();

                                    let html = '';
                                    html += '<div class="col-md-6">';
                                    html += '    <label for="basic-url" class="form-label">Choose Item</label>';
                                    html += '    <div class="input-group input-group-sm  mb-5">';
                                    html += '        <select class="form-select"  id="item" required>';
                                    html += '            <option value="">Pilih</option>';
                                    for (let i = 0; i < data.data.length; i++) {
                                        let satuan = data.data[i].satuan;

                                        if (satuan == 1) {
                                            satuan = 'Kg';
                                        } else {
                                            satuan = 'Pcs';
                                        }

                                        let jumlah = data.data[i].jumlah + ' ' + satuan;

                                        html += '<option value="' + data.data[i].id + '">' + data.data[i]
                                            .jasa +
                                            ' (' + jumlah +
                                            ') </option>';
                                    }
                                    html += '        </select>';
                                    html += '    </div>';
                                    html += '</div>';

                                    $('#chooseItem').html(html);
                                    $('#item').attr('required', true);


                                } else {
                                    console.log('hide lho harusnya');
                                    $('#chooseItem').hide();
                                    $('#item').val();

                                }
                            } else {
                                $('#chooseItem').hide();
                                $('#item').empty();


                            }
                        }
                        if (data.status == 'success') {
                            $('#led').removeClass('badge-warning');
                            $('#led').removeClass('badge-danger');
                            $('#led').removeClass('badge-primary');
                            $('#led').addClass('badge-success');
                        } else if (data.status == 'warning') {
                            $('#led').removeClass('badge-success');
                            $('#led').removeClass('badge-danger');
                            $('#led').removeClass('badge-primary');
                            $('#led').addClass('badge-warning');
                        } else if (data.status == 'error') {
                            $('#led').removeClass('badge-success');
                            $('#led').removeClass('badge-warning');
                            $('#led').removeClass('badge-primary');
                            $('#led').addClass('badge-danger');
                        } else {
                            $('#led').removeClass('badge-success');
                            $('#led').removeClass('badge-warning');
                            $('#led').removeClass('badge-primary');
                            $('#led').addClass('badge-danger');
                        }

                        $('.status').html(data.status);
                        $('.message').html(data.message);


                        $.ajax({
                            url: base_url() + `/scanner/getDataPelanggan`,
                            method: 'get',
                            dataType: 'JSON',
                            success: function(data) {
                                console.log(data);

                                $('.nama').html(data.customer.nama);
                                $('.telpon').html(data.customer.telpon);
                                var total = money(data.pembayaran.total_harga);
                                $('.total').html(total);
                                var pembayaran = data.pembayaran.status;
                                if (pembayaran == 1) {
                                    pembayaran = 'Belum Bayar';
                                } else if (pembayaran == 2) {
                                    pembayaran = 'DP (' + money(data.pembayaran.bayar_dp) + ')';
                                } else if (pembayaran == 3) {
                                    pembayaran = 'Lunas';
                                } else {
                                    pembayaran = '-';
                                }
                                $('.pembayaran').html(pembayaran);


                                var transaksi = '';

                                for (let i = 0; i < data.transaksi.length; i++) {
                                    var satuan = data.transaksi[i].satuan;
                                    if (satuan == 1) {
                                        satuan = 'Kg';
                                    } else {
                                        satuan = 'Pcs';
                                    }
                                    var space = ' ';
                                    var jumlah = '(' + data.transaksi[i].jumlah + space + satuan +
                                        ')';

                                    no = i + 1;
                                    if (data.transaksi.length == 1) {
                                        transaksi += data.transaksi[i].jasa + space +
                                            jumlah;
                                    } else {
                                        transaksi += '- ' + data.transaksi[i].jasa + space +
                                            jumlah;
                                        transaksi += '<br>';
                                    }


                                }
                                $('.jasa').html(transaksi);
                            }
                        });

                    }
                })
            }
        }





        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 200,
                rememberLastUsedCamera: true,
                // supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
