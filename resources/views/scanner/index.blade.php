@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('user/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    TambahG
                </a>
            </div>
        </div>
        <div class="card-body py-5">

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <main>
                        <video id="preview" style="border: 1px; border-style: solid; width:200px"></video>


                    </main>

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




                </table>
            </div>
        </div>
    </div>



    </div>
    </div>
@endsection




@push('scripts')
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        // // -----------------------
        // $('#submit').click(function(e) {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     let item = $('#item').val();
        //     // // let item = 3;

        //     // console.log(item);

        //     // // let content = 'kdbrks9ej4'; //kode cucian dicuci
        //     // let content = '112E78343B88'; //kode pembayaran
        //     // // let content = 'kdje934j5i'; //kode cucian setrika
        //     // // let content = '0sj4jfekd3'; //kode cucian packing
        //     // // let content = '112E78343B88'; //kode pembayaran
        //     // // let content = '112E78343BA4'; //kode pembayaran 2
        //     // // let content = '112E78343BBE'; //kode pembayaran 4
        //     // // let content = 'asdfd'; //kode acak
        //     // console.log(content);
        //     // // console.log(token);
        //     $.ajax({
        //         url: `/scanner/checkScanType`,
        //         method: "POST",
        //         data: {
        //             "content": content,
        //             "idTransaksi": item
        //         },

        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data);
        //             if (data == null) {
        //                 alert('Qrcode Tidak Dikenali!');
        //             } else {
        //                 if (data.jumlah_data > 1) {

        //                     if (item == null) {
        //                         let html = '';
        //                         html += '<div class="col-md-6">';
        //                         html += '    <label for="basic-url" class="form-label">Status</label>';
        //                         html += '    <div class="input-group input-group-sm  mb-5">';
        //                         html += '        <select class="form-select"  id="item" required>';
        //                         html += '            <option value="">Pilih</option>';
        //                         for (let i = 0; i < data.data.length; i++) {
        //                             let satuan = data.data[i].satuan;

        //                             if (satuan == 1) {
        //                                 satuan = 'Kg';
        //                             } else {
        //                                 satuan = 'Pcs';
        //                             }

        //                             let jumlah = data.data[i].jumlah + ' ' + satuan;

        //                             html += '<option value="' + data.data[i].id + '">' + data.data[i]
        //                                 .jasa +
        //                                 ' (' + jumlah +
        //                                 ') </option>';
        //                         }
        //                         html += '        </select>';
        //                         html += '    </div>';
        //                         html += '</div>';

        //                         $('#chooseItem').html(html);
        //                         $('#item').attr('required', true);
        //                     } else {
        //                         console.log('hide lho harusnya');
        //                         $('#chooseItem').hide();
        //                     }





        //                 }


        //             }
        //         }
        //     });
        // })



        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            mirror: false,
            captureImage: true,
            backgroundScan: true,
            continuous: true,
        });



        scanner.addListener('scan', function(kode) {



            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // let item = $('#item').val();

            // // let item = 3;

            // console.log(item);

            // // let content = 'kdbrks9ej4'; //kode cucian dicuci
            // let content = '112E78343B88'; //kode pembayaran
            // // let content = 'kdje934j5i'; //kode cucian setrika
            // // let content = '0sj4jfekd3'; //kode cucian packing
            // // let content = '112E78343B88'; //kode pembayaran
            // // let content = '112E78343BA4'; //kode pembayaran 2
            // // let content = '112E78343BBE'; //kode pembayaran 4
            // // let content = 'asdfd'; //kode acak
            // var kode = '116DE9A3A7AA'; // true server
            // console.log(content);
            // // console.log(token);
            // let content = kode;
            // $('.kode_barang').html(kode);
            // alert(content);
            // console.log(qrcode);
            // console.log(content);
            $.ajax({
                url: "/scanner/checkScanType/" + kode,
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    $('.kode_barang').html(data);
                    // alert(data);
                    if (data == false) {
                        $('.status').html('Qrcode Tidak Dikenali!');
                    } else {
                        // if (data.jumlah_data > 1) {

                        //     if (item == null) {
                        //         let html = '';
                        //         html += '<div class="col-md-6">';
                        //         html += '    <label for="basic-url" class="form-label">Status</label>';
                        //         html += '    <div class="input-group input-group-sm  mb-5">';
                        //         html += '        <select class="form-select"  id="item" required>';
                        //         html += '            <option value="">Pilih</option>';
                        //         for (let i = 0; i < data.data.length; i++) {
                        //             let satuan = data.data[i].satuan;

                        //             if (satuan == 1) {
                        //                 satuan = 'Kg';
                        //             } else {
                        //                 satuan = 'Pcs';
                        //             }

                        //             let jumlah = data.data[i].jumlah + ' ' + satuan;

                        //             html += '<option value="' + data.data[i].id + '">' + data.data[i]
                        //                 .jasa +
                        //                 ' (' + jumlah +
                        //                 ') </option>';
                        //         }
                        //         html += '        </select>';
                        //         html += '    </div>';
                        //         html += '</div>';

                        //         $('#chooseItem').html(html);
                        //         $('#item').attr('required', true);

                        //     } else {
                        //         console.log('hide lho harusnya');
                        //         $('#chooseItem').hide();
                        //     }


                        // } else {
                        //     alert(data);
                        // }

                        $('.status').html('Success');
                    }
                },
                error: function() {
                    $('.status').html('Gagal TOtal');
                }
            });


        });


        Instascan.Camera.getCameras().then(function(cameras) {

            if (cameras.length > 0) {
                scanner.start(cameras[1]);


                $('.front-camera').on('click', function() {
                    console.log('kamera depan');
                    var html = '';
                    html +=
                        '<button class="btn  btn-sm btn-secondary back" ><i class="fa flaticon-refresh"></i></button>';

                    $('.back-camera').html(html);
                    $('.front-camera').hide();
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert('No Front camera found!');
                    }
                });
                $('.back-camera').on('click', function() {
                    console.log('kamera belakang');
                    // var html2='';
                    //   html2+='<button class="btn btn-sm btn-secondary front" ><i class="fa flaticon-refresh"></i></button>';
                    $('.front-camera').show();
                    $('.back').remove();

                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert('No Back camera found!');
                    }
                });

                // $('[name="options"]').on('change',function(){
                //     if($(this).val()==1){
                //         if(cameras[1]!=""){
                //             scanner.start(cameras[1]);
                //         }else{
                //             alert('No Front camera found!');
                //         }
                //     }else if($(this).val()==2){
                //         if(cameras[0]!=""){
                //             scanner.start(cameras[0]);
                //         }else{
                //             alert('No Back camera found!');
                //         }
                //     }
                // });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    </script>
@endpush
