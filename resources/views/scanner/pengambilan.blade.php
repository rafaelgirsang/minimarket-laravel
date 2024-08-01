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
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"> <div class="jasa"></div></td>
                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <th>
                            <div class="total"></div>
                        </th>
                    </tr>
                     <tr class="tr_diskon">
                        <td>Diskon</td>
                        <td>:</td>
                        <td>
                            <div class="diskon"></div>
                        </td>
                    </tr>
                   <!--   <tr class="tr_dp">
                        <td>DP</td>
                        <td>:</td>
                        <td>
                            <div class="dp"></div>
                        </td>
                    </tr>

                      <tr class="tr_kurang_bayar">
                        <td>Kurang</td>
                        <td>:</td>
                        <th>
                            <div class="kurang_bayar"></div>
                        </th>
                    </tr> -->
                    <tr>
                        <td>Pembayaran</td>
                        <td>:</td>
                        <th>
                            <div class="pembayaran"></div>
                        </th>
                    </tr>
                    




                </table>

                <div id="show-button-transakasi">
                    
                </div>
                
            </div>


        </div>
    </div>



    </div>
    </div>


    <div class="modal fade" tabindex="-1" id="update">
        <form action="{{ url('scanner/updatePembayaran') }}" method="POST">
            @csrf

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                        <h3 class="modal-title">Update</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body text-center">
                        <h1>Apakah cucian sudah diambil dan pembayaran sudah lunas?</h1>

                    </div>





                    <input type="hidden" id="pembayaran_id" name="id">



                    <div class="modal-footer" style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                        <button type="button" class="btn btn-light btn-sm  hover-scale"
                            data-bs-dismiss="modal">Belum</button>
                        <button type="submit" class="btn btn-primary btn-sm  hover-scale">Iya</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection




@push('scripts')
    {{-- <script src="https://unpkg.com/html5-qrcode"></script> --}}

    <script src="{{ base_url() }}/assets/js/html5-qrcode.js"></script>

    <script type="text/javascript">


        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

         $('.tr_diskon').hide();
            $('.tr_dp').hide();
            $('.tr_kurang_bayar').hide();

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
              
                var idTransaksi = $('#item').val();
                // console.log(idTransaksi);
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
                                // console.log(data);

                                $('.nama').html(data.customer.nama);
                                $('.telpon').html(data.customer.telpon);
                                var total = money(data.pembayaran.total_harga);
                                $('.total').html(total);
                                var diskon = money(data.pembayaran.diskon);
                                  if(diskon == 0){
                                     $('.tr_diskon').hide();
                                 }else{
                                      $('.tr_diskon').show();
                                      diskon = '('+diskon+')';
                                      $('.diskon').html(diskon);                                  
                                 }


                               
                               




                                var pembayaran = data.pembayaran.status;

                                var metode = data.metode;

                                console.log(data);
                                if(metode != null){
                                    metode = '('+data.metode.metode+')';
                                }else{
                                    metode = '';
                                }

                                if (pembayaran == 1) {
                                    pembayaran = 'Belum Bayar';
                                } else if (pembayaran == 2) {
                                    pembayaran = 'Lunas '+ metode;
                                } else {
                                    pembayaran = '-';
                                }
                                $('.pembayaran').html(pembayaran);



                                var transaksi = '';                          

                                for (let i = 0; i < data.transaksi.length; i++) {


                                    var status = data.transaksi[i].status_id;
                                  
                                    var icon = '';
                                    if(status == 1 || status == 2 || status == 3){
                                        icon = '<i class="bi bi-hourglass-split"></i>';
                                    }else if( status == 4){
                                        icon = '<i class="bi bi-check-circle-fill"></i>';
                                    }else if(status == 5){
                                        icon = '<i class="bi bi-person-fill-check"></i>';
                                    }else if(status == 6){
                                        icon = '<i class="bi bi-x-circle-fill"></i>'
                                    }else{
                                        icon = '<i class="bi bi-person-fill-check"></i>';
                                    }


                                    var satuan = data.transaksi[i].satuan;
                                    if (satuan == 1) {
                                        satuan = 'Kg';
                                    } else {
                                        satuan = 'Pcs';
                                    }
                                    var space = ' ';

                                    var rak = data.transaksi[i].rak;
                                    if(rak != null){
                                        rak = '- '+data.transaksi[i].rak
                                    }else{
                                        rak = '';
                                    }

                                    var jumlah = '(' + data.transaksi[i].jumlah + space + satuan +
                                        ') '+rak;

                                    no = i + 1;
                                    if (data.transaksi.length == 1) {
                                        transaksi += icon +' '+ data.transaksi[i].jasa + space +
                                            jumlah;
                                    } else {
                                        transaksi += icon +' ' + data.transaksi[i].jasa + space +
                                            jumlah;
                                        transaksi += '<br>';
                                    }


                                }
                                $('.jasa').html(transaksi);


                                var html = '';
                                 html +=' <div class="row ">';
                                 html +='     <div class="col-md-12">';
                                 html +='         <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#update" style="width :100%; max-width: 500px;">Transaksi Selesai</button>';
                                 html +='     </div>';
                                 html +=' </div>';

                                   $('#show-button-transakasi').html(html);

                                   $("#pembayaran_id").val(data.pembayaran.id);
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
