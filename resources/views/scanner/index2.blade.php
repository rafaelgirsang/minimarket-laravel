@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('user/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    TambahB
                </a>
            </div>
        </div>
        <div class="card-body py-5">

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <div id="qr-reader" style="width:500px"></div>
                    <div id="qr-reader-results"></div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">

                    <div class="front-camera">
                        <button class="btn  btn-sm btn-secondary front"><i class="fa flaticon-refresh"></i></button>
                    </div>
                    <div class="back-camera">

                    </div>


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
                        <td style="width:30%">Kode</td>
                        <td style="width:2px">:</td>
                        <td>
                            <div class="kode_barang"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <div class="status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>:</td>
                        <td>
                            <div class="message"></div>
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
    <script src="https://unpkg.com/html5-qrcode"></script>
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
                    url: "scanner/checkScanType",
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

                        $('.status').html(data.status);
                        $('.message').html(data.message);

                    }
                })
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
