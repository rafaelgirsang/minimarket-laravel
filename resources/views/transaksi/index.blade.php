@extends('layout.app')

@push('meta-refresh')
    <meta http-equiv="refresh" content="120">
@endpush
@section('content')
    <div class="row mb-2">
        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($omset) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Omset Hari Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($omsetBersih) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Omset Bersih Hari Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($cash) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Cash Hari Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($qris) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">QRIS Hari Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header card-header-costum">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-toolbar">
                        <a href="{{ url('transaksi/create') }}" class="btn btn-sm btn-primary"
                            style="background-color:  #b874f1 !important ;color:black">
                            Tambah
                        </a>

                    </div>
                </div>
                <div class="card-body py-5">

                    <form method="get">
                        <div class="d-flex d-flex-search mb-4">
                            <input type="text" class="form-control form-control-sm input-btn" name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-sm btn-primary btn-input"><i class="bi bi-search"></i></button>
                            <a href="#" class="btn btn-sm btn-flex btn-success fw-bold" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end" style="margin-left: 10px">
                                <i class="ki-duotone ki-filter fs-6  ">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i></a>

                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                id="kt_menu_641ac3feccaa7">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5">

                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" style="font-size:1rem"
                                                    name="searchBy">
                                                    <option {{ crypt_open(request('searchBy')) == '' ? 'Selected' : '' }}
                                                        value="">Pilih</option>
                                                    <option
                                                        {{ crypt_open(request('searchBy')) == 'nama' ? 'Selected' : '' }}
                                                        value="{{ crypt_make('nama') }}">Nama</option>
                                                    <option
                                                        {{ crypt_open(request('searchBy')) == 'jasa' ? 'Selected' : '' }}
                                                        value="{{ crypt_make('jasa') }}">Jasa</option>



                                                </select>
                                                <label for="floatingSelect" style="padding-left:10px">Search By</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input class="form-control" id="floatingSelect"
                                                    aria-label="Floating label select example" style="font-size:1rem"
                                                    type="date" name="tanggal" value="{{ request('tanggal') }}">
                                                <label for="floatingSelect" style="padding-left:10px">Tanggal</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" style="font-size:1rem"
                                                    name="show">

                                                    <option value="">Pilih</option>
                                                    <option value="10" {{ selected(request('show'), '10') }}>10
                                                    </option>
                                                    <option value="25" {{ selected(request('show'), '25') }}>25
                                                    </option>
                                                    <option value="50" {{ selected(request('show'), '50') }}>50
                                                    </option>
                                                    <option value="100" {{ selected(request('show'), '100') }}>100
                                                    </option>
                                                </select>
                                                <label for="floatingSelect" style="padding-left:10px">Show Data</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ url()->current() }}" type="reset"
                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</a>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>

                        </div>
                    </form>
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped table-bordered table-hover border rounded w-100 text-center"
                                    sty>
                                    <thead>
                                        <tr class="tb-head bg-primary text-light-primary">
                                            <th class="w-40px">No</th>
                                            <th class="w-100px">Tanggal</th>
                                            <th class="w-50px">Jam</th>
                                            <th class="w-100px">Jumlah Item</th>
                                            <th class="w-100px">Subtotal</th>
                                            <th class="w-100px">Diskon</th>
                                            <th class="w-100px">Administrasi</th>
                                            <th class="w-100px">Total Omset</th>
                                            <th>Pembayaran</th>
                                            <th>Invoice</th>
                                            <th>Item</th>
                                            <th>User</th>

                                            <th class="w-40px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty(checkData($data)))
                                            @php
                                                $no = number($data);
                                            @endphp
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>

                                                    <td>{{ formatTanggal($row->tanggal) }}</td>
                                                    <td>{{ formatJam($row->created_at) }}</td>

                                                    <td>{{ $row->jumlah_item }}</td>
                                                    <td class="text-end" style="background: #e2ffe2">
                                                        {{ money($row->total_harga) }}</td>
                                                    <td class="text-end" style="background: #fa9b9b">
                                                        {{ money($row->diskon) }}
                                                    </td>
                                                    <td class="text-end" style="background: #fa9b9b">
                                                        {{ money($row->administrasi) }}</td>
                                                    <td class="text-end" style="background: #c8f3c8">
                                                        {{ money($row->total_harga - $row->administrasi - $row->diskon) }}
                                                    </td>
                                                    <td>{{ $row->metode->metode }}</td>
                                                    <td>{{ $row->invoice }}</td>

                                                    <td><a href="{{ url('transaksi/item/' . $row->id) }}"
                                                            class="btn btn-sm btn-success">Item</a></td>
                                                    <td>{{ $row->user->nama_user }}</td>


                                                    <td>
                                                        <a href="#"
                                                            class="droppdown btn btn-sm btn-light btn-flex btn-center"
                                                            style="border-radius:50px; padding:7px"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            <i class="bi bi-three-dots" style="padding-right:0px"></i>
                                                        </a>

                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true" style="">
                                                            <!--begin::Menu item-->

                                                            <div class="menu-item px-3">
                                                                <a data-bs-toggle="modal" data-bs-target="#status"
                                                                    data-id="{{ $row->id }}"
                                                                    class="menu-link px-3 status">Status</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a
                                                                    href="{{ url('transaksi/historyStatus/' . crypt_make($row->id)) }}"class="menu-link px-3 update">History</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#cetakNota{{ $row->id }}"
                                                                    data-id="{{ $row->id }}"
                                                                    class="menu-link px-3 ">
                                                                    Nota</a>
                                                            </div>

                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">
                                                    <span class="text-muted"><i>Empty data</i><span>
                                                </td>
                                            </tr>
                                        @endif




                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $data->onEachSide(1)->appends(Request::except('page'))->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->



@endsection




@push('scripts')
    <!--Begin Update Status -->
    <script>
        function selected(key, value) {
            if (key == value) {
                return 'selected';
            } else {
                return '';
            }
        }
        $('.status').on('click', function() {



            const id = $(this).data('id');

            $.ajax({
                url: base_url() + `/transaksi/getTransaksiById/` + id,
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    // console.log(data);

                    $('#id-update-status').val(data.transaksi.id);
                    $('#tanggal-update-status').val(data.transaksi.tanggal);
                    $('#jasa-update-status').val(data.transaksi.jasa);
                    $('#harga-update-status').val(data.transaksi.harga);
                    $('#customer-update-status').val(data.customer.nama);

                    var satuan = data.transaksi.satuan;
                    if (satuan == 1) {
                        satuan = 'Kg';
                    } else if (satuan == 2) {
                        satuan = 'Pcs';
                    }
                    var jumlah = data.transaksi.jumlah + ' ' + satuan;
                    $('#jumlah-update-status').val(jumlah);

                    var statusId = data.transaksi.status_id;

                    $.ajax({
                        url: base_url() + `/transaksi/getTransaksiStatus`,
                        method: "GET",
                        dataType: 'JSON',
                        success: function(data) {
                            var status = '';
                            status += '<option value="">Pilih</option>';



                            for (let i = 0; i < data.length; i++) {

                                status += '<option value="' + data[i].id + '" ' + selected(
                                        data[i].id,
                                        statusId) +
                                    ' >' + data[i].status + '</option>';

                                console.log(data[i].status);
                            }
                            $('#status-update-select').html(status);
                        }
                    });

                    var rak = data.transaksi.rak;
                    if (rak == null) {
                        rak = '';
                    } else {
                        rak = rak;
                    }


                    if (statusId == 4) {
                        var html = '';
                        html += '    <div class="row">'
                        html += '        <div class="col-md-12">'
                        html += '            <label for="basic-url" class="form-label">Rak</label>'
                        html += '            <div class="input-group input-group-sm  mb-5">'
                        html +=
                            '               <input type="text" class="form-control" name="rak" value="' +
                            rak + '">'
                        html += '            </div>'
                        html += '        </div>'
                        html += '    </div>'

                        $('#show_rak').html(html);
                        $('#show_rak').show();

                    } else {
                        $('#show_rak').hide();
                    }

                }
            });

        });

        $('#status-update-select').change(function() {

            var statusId = $(this).val();
            const id = $('#id-update-status').val();
            console.log(id);
            if (statusId == 4) {

                $.ajax({
                    url: base_url() + `/transaksi/getTransaksiById/` + id,
                    method: "GET",
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        var rak = data.transaksi.rak;
                        if (rak == null) {
                            rak = '';
                        } else {
                            rak = rak;
                        }

                        var html = '';
                        html += '    <div class="row">'
                        html += '        <div class="col-md-12">'
                        html += '            <label for="basic-url" class="form-label">Rak</label>'
                        html += '            <div class="input-group input-group-sm  mb-5">'
                        html +=
                            '               <input type="text" class="form-control" name="rak" value="' +
                            rak + '">'
                        html += '            </div>'
                        html += '        </div>'
                        html += '    </div>'

                        $('#show_rak').html(html);
                        $('#show_rak').show();


                    }
                });



            } else {
                $('#show_rak').hide();
            }
        });
    </script>
    <!--End Update Status -->


    <!--Begin Update Jasa -->
    <script>
        function selected(key, value) {
            if (key == value) {
                return 'selected';
            } else {
                return '';
            }
        }
        $('.updateJasa').on('click', function() {



            const id = $(this).data('id');

            $.ajax({
                url: base_url() + `/transaksi/getTransaksiById/` + id,
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    // console.log(data);

                    $('#id-update-jasa').val(data.transaksi.id);
                    $('#tanggal-update-jasa').val(data.transaksi.tanggal);
                    $('#jasa-update-jasa').val(data.transaksi.jasa);
                    $('#harga-update-jasa').val(data.transaksi.harga);
                    $('#customer-update-jasa').val(data.customer.nama);
                    $('#telpon-update-jasa').val(data.customer.telpon);
                    $('#jumlah-update-jasa').val(data.transaksi.jumlah);
                    $('#deadline-jam-update-jasa').val(data.transaksi.deadline_jam);

                    var total = data.transaksi.harga * data.transaksi.jumlah;
                    $('#total-update-jasa').val(total);

                    var tipeWaktu = data.transaksi.tipe_waktu;

                    if (tipeWaktu == 1) {
                        var waktu = '';
                        waktu += '   <option value="">Pilih</option> ';
                        waktu += '   <option value="1" selected>Jam</option> ';
                        waktu += '   <option value="2" >Hari</option>';
                    } else {
                        var waktu = '';
                        waktu += '   <option value="">Pilih</option> ';
                        waktu += '   <option value="1" >Jam</option> ';
                        waktu += '   <option value="2" selected>Hari</option>';
                    }
                    $('#waktu-update-jasa').html(waktu);


                    if (tipeWaktu == 1) {
                        $('#deadline-jam-update-jasa').val(data.transaksi.deadline_jam);
                    } else {
                        var deadlineHari = data.transaksi.deadline_jam / 24;
                        $('#deadline-jam-update-jasa').val(deadlineHari);
                    }









                }
            });

        });


        $('.harga-jasa').on('keyup', function() {

            var jumlah = $('#jumlah-update-jasa').val();
            var harga = $('#harga-update-jasa').val();

            var total = jumlah * harga;
            $('#total-update-jasa').val(total);




        });

        $('.jumlah-jasa').on('keyup', function() {

            var jumlah = $('#jumlah-update-jasa').val();
            var harga = $('#harga-update-jasa').val();

            var total = jumlah * harga;
            $('#total-update-jasa').val(total);




        });
    </script>
    <!--End Update Jasa -->
@endpush
