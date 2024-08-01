@extends('layout.app')

@push('meta-refresh')
    <meta http-equiv="refresh" content="120">
@endpush
@section('content')

<!-- <a class="btn btn-primary btn-sm" href="my.bluetoothprint.scheme://https://purplebubbleslaundry.com/cetak.php?id=2" target="_blank">Cetak</a> -->


    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('transaksi/createfs') }}" class="btn btn-sm btn-primary  hover-scale">
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
                                            <option {{ crypt_open(request('searchBy')) == 'nama' ? 'Selected' : '' }}
                                                value="{{ crypt_make('nama') }}">Nama</option>
                                            <option {{ crypt_open(request('searchBy')) == 'jasa' ? 'Selected' : '' }}
                                                value="{{ crypt_make('jasa') }}">Jasa</option>


                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Search By</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="status">

                                            <option value="">Pilih</option>
                                            @foreach ($status as $rowStatus)
                                                <option value="{{ $rowStatus->id }}"
                                                    {{ selected(request('status'), $rowStatus->id) }}>
                                                    {{ $rowStatus->status }}</option>
                                            @endforeach


                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Status</label>
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
                                            <option value="10" {{ selected(request('show'), '10') }}>10</option>
                                            <option value="25" {{ selected(request('show'), '25') }}>25</option>
                                            <option value="50" {{ selected(request('show'), '50') }}>50</option>
                                            <option value="100" {{ selected(request('show'), '100') }}>100</option>
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
                        <table class="table table-striped table-bordered table-hover border rounded w-100 text-center" sty>
                            <thead>
                                <tr class="tb-head bg-primary text-light-primary">
                                    <th style="width:50px">No</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>Jasa</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Deadline</th>
                                    <th>Status</th>

                                    <th>$</th>
                                  

                                    <th style="width:50px">#</th>
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
                                            <td >{{ $row->customer->nama }}</td>
                                            <td>{{ $row->jasa }}</td>
                                            <td>{{ $row->jumlah }} {{ $row->satuan == 1 ? 'Kg' : 'Pcs' }}</td>
                                            <td class="text-end">{{ money($row->harga) }}</td>
                                            <td class="text-end">{{ money($row->harga * $row->jumlah) }}</td>
                                            <td>{{ deadlineShort($row->jam) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $row->status->color }}"
                                                    style="width: 60px">{{ $row->status->status }}</span>
                                            </td>


                                            <td>{{ statusPembayaranShort($row->pembayaran->status) }}</td>
                                           



                                            <td>
                                                <a href="#" class="droppdown btn btn-sm btn-light btn-flex btn-center"
                                                    style="border-radius:50px; padding:7px" data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">
                                                    <i class="bi bi-three-dots" style="padding-right:0px"></i>
                                                </a>

                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('penjualan/edit/' . crypt_make($row->id)) }}"class="menu-link px-3 update">Edit</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#pembayaran{{ $row->id }}"
                                                            data-id="{{ $row->id }}"
                                                            class="menu-link px-3 pembayaran">Pembayaran</a>
                                                    </div>
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
                                                            data-id="{{ $row->id }}" class="menu-link px-3 ">Print
                                                            Nota</a>
                                                    </div>

                                                     <div class="menu-item px-3">
                                                        <a href="https://api.whatsapp.com/send?phone={{telpWa($row->customer->telpon)}}&text=Terimkasih telah mencuci di Purple Bubbles Laundry. Silahkan check nota melalui link ini : https://purplebubbleslaundry.com/nota/{{$row->pembayaran->kode}}" class="menu-link px-3 " target="_blank">Kirim
                                                            Nota </a>
                                                    </div>
                                                    {{-- <form action="{{ url('produk/' . crypt_make($row->id)) }}"
                                                        method="post" id="form-delete-{{ $row->id }}">
                                                        <div class="menu-item px-3">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="destroy({{ $row->id }})"
                                                                class="menu-link px-3">Delete</a>
                                                        </div>
                                                    </form> --}}
                                                    <!--end::Menu item-->
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


    @foreach ($data as $row)
        <div class="modal fade" tabindex="-1" id="pembayaran<?= $row['id'] ?>">
            <form action="{{ url('transaksi/updatePembayaran/' . $row->pembayaran_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                            <h3 class="modal-title">Update Pembayaran</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Customer</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="customer" id="customer"
                                            value="{{ $row->customer->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Tanggal</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="tanggal"
                                            value="{{ formatTanggal($row->tanggal) }}" id="tanggal" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            @php
                                $transaksi = getTransaksiById($row->pembayaran_id);
                            @endphp
                            @foreach ($transaksi as $rowTransaksi)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="basic-url" class="form-label">Jasa</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="jasa" id="jasa"
                                                value="{{ $rowTransaksi->jasa }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="basic-url" class="form-label">Jumlah</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="jumlah" id="jumlah"
                                                value="{{ $rowTransaksi->jumlah }} {{ $rowTransaksi->satuan == 1 ? ' Kg' : ' Pcs' }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="basic-url" class="form-label">Harga</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="jumlah" id="jumlah"
                                                value="{{ $rowTransaksi->harga }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="basic-url" class="form-label">Subtotal</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="jumlah" id="jumlah"
                                                value="{{ $rowTransaksi->jumlah * $rowTransaksi->harga }} " readonly>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>

                            @if ($row->pembayaran->status == 2)
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="basic-url" class="form-label">Total</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="total_harga" id="jumlah"
                                                value="{{ $row->pembayaran->total_harga }} " readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="basic-url" class="form-label">DP</label>
                                        <div class="input-group input-group-sm ">
                                            <input type="text" class="form-control" name="dp" id="jumlah"
                                                value="{{ $row->pembayaran->bayar_dp }} " readonly>

                                        </div>
                                        <div class="text-danger" style="font-size: 11px">Kurang pembayaran
                                            {{ money($row->pembayaran->total_harga - $row->pembayaran->bayar_dp) }}</div>
                                    </div>
                                    <input type="hidden" class="form-control" name="total_pelunasan"
                                        value="{{ $row->pembayaran->total_harga - $row->pembayaran->bayar_dp }} "
                                        readonly>
                                    <div class="col-md-4">
                                        <label for="basic-url" class="form-label">Pembayaran</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <select type="text" class="form-select" name="status_pembayaran" required>
                                                <option value="">Pilih</option>
                                                {{-- <option value="1" {{ selected($row->pembayaran->status, '1') }}>Wait
                                            </option>
                                            <option value="2" {{ selected($row->pembayaran->status, '2') }}>DP
                                            </option> --}}
                                                <option value="3">Lunas
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="basic-url" class="form-label">Total</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="total_harga" id="jumlah"
                                                value="{{ $row->pembayaran->total_harga }} " readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="total_pelunasan"
                                        value="{{ $row->pembayaran->total_harga }} " readonly>
                                    <div class="col-md-6">
                                        <label for="basic-url" class="form-label">Pembayaran</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <select type="text" class="form-select" name="status_pembayaran" required>
                                                <option value="">Pilih</option>
                                                {{-- <option value="1" {{ selected($row->pembayaran->status, '1') }}>Wait
                                        </option>
                                        <option value="2" {{ selected($row->pembayaran->status, '2') }}>DP
                                        </option> --}}
                                                <option value="3">Lunas
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>

                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">
                        <div class="modal-footer"
                            style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                            <button type="button" class="btn btn-light btn-sm  hover-scale"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm  hover-scale">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach



    @foreach ($data as $row)
        <div class="modal fade" tabindex="-1" id="cetakNota<?= $row['id'] ?>">
            <form action="#" method="GET">
                <!-- @csrf -->

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                            <h3 class="modal-title">Nota</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Customer</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="customer" id="customer"
                                            value="{{ $row->customer->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Tanggal</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="tanggal"
                                            value="{{ formatTanggal($row->tanggal) }}" id="tanggal" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Jasa</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="jasa" id="jasa"
                                            value="{{ $row->jasa }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Jumlah</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="jumlah" id="jumlah"
                                            value="{{ $row->jumlah }} {{ $row->satuan == 1 ? ' Kg' : ' Pcs' }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                          

                        </div>

                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">
                        <input type="hidden" id="pembayaran_id" name="pembayaran_id"
                            value="{{ $row->pembayaran_id }}">
                        <!-- <input type="hidden" id="id" name="id" value="{{ $row->id }}"> -->
                        <div class="modal-footer"
                            style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                            <button type="button" class="btn btn-light btn-sm  hover-scale"
                                data-bs-dismiss="modal">Close</button>
                            <a href="my.bluetoothprint.scheme://https://purplebubbleslaundry.com/cetak.php?id={{ $row->id }}" class="btn btn-primary btn-sm  hover-scale" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach


    <div class="modal fade" tabindex="-1" id="status">
        <form action="{{ url('transaksi/updateStatus') }}" method="POST">
            @csrf
            
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                        <h3 class="modal-title">Update Status</h3>


                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>

                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Customer</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="customer" id="customer-update-status"
                                        value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Tanggal</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="tanggal" value=""
                                        id="tanggal-update-status" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Jasa</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="jasa" id="jasa-update-status"
                                        value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Jumlah</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="jumlah" id="jumlah-update-status"
                                        value="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <label for="basic-url" class="form-label">Status</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <select type="text" class="form-select select-status" id="status-update-select"
                                        name="status_id" required>
                                        <option value="">Pilih</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="show_rak">

                        </div>


                    </div>

                    <input type="hidden" id="id-update-status" name="id" value="">
                    <div class="modal-footer" style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                        <button type="button" class="btn btn-light btn-sm  hover-scale"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm  hover-scale">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



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
                url: base_url() +`/transaksi/getTransaksiById/` + id,
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
                        url: base_url() +`/transaksi/getTransaksiStatus`,
                        method: "GET",
                        dataType: 'JSON',
                        success: function(data) {
                            var status = '';
                            status += '<option value="">Pilih</option>';



                            for (let i = 0; i < data.length; i++) {

                                status += '<option value="'+data[i].id+'" ' + selected(data[i].id,
                                        statusId) +
                                    ' >' + data[i].status + '</option>';

                                console.log(data[i].status);
                            }
                            $('#status-update-select').html(status);
                        }
                    });

                    var rak = data.transaksi.rak;
                    if(rak == null){
                       rak = ''; 
                    }else{
                        rak = rak;
                    }
                    
                    
                    if(statusId == 4){
                        var html = '';
                            html+='    <div class="row">'      
                            html+='        <div class="col-md-12">'
                            html+='            <label for="basic-url" class="form-label">Rak</label>'
                            html+='            <div class="input-group input-group-sm  mb-5">'
                            html+='               <input type="text" class="form-control" name="rak" value="'+rak+'">'
                            html+='            </div>'
                            html+='        </div>'
                            html+='    </div>'

                            $('#show_rak').html(html);
                            $('#show_rak').show();

                    }else{
                         $('#show_rak').hide();
                    }

                }
            });

        });

        $('#status-update-select').change(function(){

            var statusId = $(this).val();
            const id =  $('#id-update-status').val();
            console.log(id);
            if(statusId == 4){

                $.ajax({
                url: base_url() +`/transaksi/getTransaksiById/` + id,
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    // console.log(data);

                     var rak = data.transaksi.rak;
                    if(rak == null){
                       rak = ''; 
                    }else{
                        rak = rak;
                    }

                      var html = '';
                    html+='    <div class="row">'      
                    html+='        <div class="col-md-12">'
                    html+='            <label for="basic-url" class="form-label">Rak</label>'
                    html+='            <div class="input-group input-group-sm  mb-5">'
                    html+='               <input type="text" class="form-control" name="rak" value="'+rak+'">'
                    html+='            </div>'
                    html+='        </div>'
                    html+='    </div>'

                    $('#show_rak').html(html);
                    $('#show_rak').show();

                    
                    }
                });


              
            }else{
                 $('#show_rak').hide();
            }
        });
    </script>
    <!--End Update Status -->
@endpush
