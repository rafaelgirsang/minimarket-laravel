@extends('layout.kasir')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card  shadow-sm mb-3">


                <div class="card-header card-header-form">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-toolbar">
                    </div>
                </div>

                <div class="card-body py-5">
                    <form action="{{ url('transaksi/createTemp') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="basic-url" class="form-label">Barcode</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control input-barcode" id="barcode" name="barcode"
                                        value="" autofocus>

                                </div>
                            </div>
                            <div class="col-6">
                                <label for="basic-url" class="form-label">Produk</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <select class="form-select form-select-sm pilih-produk" data-control="select2"
                                        data-placeholder="Pilih produk" name="produk">
                                        <option></option>
                                        @foreach ($produk as $rowProduk)
                                            <option value="{{ $rowProduk->barcode }}">
                                                {{ $rowProduk->nama_produk }}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-2">
                                <label for="basic-url" class="form-label" style="color: white">s</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <button type="submit" class="btn btn-sm btn-primary" style="width: 100%">+</button>
                                </div>
                            </div> --}}
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive" style="min-height: 275px">
                                <table
                                    class="table table-striped table-bordered table-hover border rounded w-100 text-center"
                                    sty>
                                    <thead>
                                        <tr class="tb-head bg-primary text-light-primary">
                                            <th class="w-10px">No</th>
                                            <th style="width: 35%">Produk</th>
                                            <th class="w-10px">Jumlah</th>
                                            <th class="w-40px">Harga</th>
                                            <th class="w-40px">Total</th>


                                            <th class="w-15px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td class="text-start">{{ $row->produk }} <span
                                                        style="font-style: italic; color:grey; font-size:12px">(Stok :
                                                        {{ getStokByProdukId($row->produk_id) - $row->jumlah }})</span></td>
                                                <td>{{ $row->jumlah }}</td>
                                                <td class="text-end">{{ money($row->harga) }}</td>
                                                <td class="text-end">{{ money($row->harga * $row->jumlah) }}</td>
                                                <td>
                                                    <div class="row" style="--bs-gutter-x: 0rem">
                                                        <div class="col-6 text-center">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#updateItemTemp{{ $row->id }}">
                                                                <i class="bi bi-pencil-square text-success">
                                                                </i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6 text-center">
                                                            <form
                                                                action="{{ url('transaksi/deleteItem/' . crypt_make($row->id)) }}"
                                                                method="post" id="form-delete-{{ $row->id }}">

                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" onclick="destroy({{ $row->id }})"
                                                                    class="menu-link px-3"><i
                                                                        class="bi bi-trash text-danger">
                                                                    </i>
                                                                </a>

                                                            </form>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>





                </div>
                <div class="card-footer card-footer-form">
                    <div class="row">
                        <div class="col-12 text-end">
                            @if ($exist)
                                <a href="{{ url('transaksi/reset') }}" class="btn  btn-primary btn-sm">
                                    Reset
                                </a>
                            @else
                                <button class="btn  btn-primary btn-sm" disabled>
                                    Reset
                                </button>
                            @endif
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card  shadow-sm">
                        <div class="card-body ">
                            <div class="d-flex flex-stack bg-success rounded-3 p-6">
                                <!--begin::Content-->
                                <div class="fs-7 fw-bold text-white">
                                    <span class="d-block lh-1 mb-2">Jumlah Item</span>
                                    <span class="d-block mb-2">Subtotal</span>
                                    <span class="d-block mb-9">Diskon</span>
                                    <span class="d-block fs-2qx lh-1">Total</span>
                                </div>
                                <!--end::Content-->

                                <!--begin::Content-->
                                <div class="fs-7 fw-bold text-white text-end">
                                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">{{ $jumlahItem }} </span>
                                    <span class="d-block mb-2" data-kt-pos-element="total">{{ money($subtotal) }}</span>
                                    <div id="hide-diskon">
                                        <span class="d-block mb-9" data-kt-pos-element="discount" id="hide-diskon">0</span>
                                    </div>

                                    <div id="show-diskon"></div>


                                    <div id="hide-total">
                                        <span class="d-block fs-2qx lh-1"
                                            data-kt-pos-element="grant-total">{{ money($subtotal) }}</span>
                                        <input type="hidden" id="total-harga-display" value="{{ $subtotal }}">
                                    </div>
                                    <div id="show-total"></div>

                                </div>
                                <!--end::Content-->
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card  shadow-sm">
                        <form action="{{ url('transaksi/save') }}" method="POST">
                            @csrf
                            <div class="card-body ">
                                {{-- <div class="row">
                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Metode Pembayaran</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <select type="number" class="form-control pilih-metode-pembayaran"
                                                name="metode_id" required>
                                                <option value="">Pilih</option>
                                                @foreach ($metode as $rowMetode)
                                                    <option value="{{ $rowMetode->id }}"
                                                        {{ selected($rowMetode->id, $metodeId) }}>{{ $rowMetode->metode }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                </div> --}}

                                @if ($exist)
                                    @php
                                        $disabled = '';
                                    @endphp
                                @else
                                    @php
                                        $disabled = 'disabled';
                                    @endphp
                                @endif

                                <div class="row">
                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Diskon</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="number" class="form-control input-diskon" id="diskon"
                                                name="diskon" value="0" {{ $disabled }}>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Nominal Pembayaran</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="number" class="form-control input-pembayaran" id="pembayaran"
                                                name="pembayaran" value="0" {{ $disabled }}>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" id="total-harga" value="{{ $subtotal }}">

                                        <h1 id="kembalian-old">Kembalian : </h1>
                                        <div id="kembalian-new">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">

                                        <button class="btn  btn-success btn-sm" type="submit" name="metode_pembayaran"
                                            value="1" {{ $disabled }}>CASH</button>

                                    </div>
                                    <div class="col-6 text-end">

                                        <button class="btn  btn-primary btn-sm" type="submit" name="metode_pembayaran"
                                            value="2" {{ $disabled }}>QRIS</button>

                                    </div>
                                </div>


                                {{-- <div class="row">
                                    <div class="col-6">
                                        @if ($exist)
                                            <a href="{{ url('transaksi/reset') }}" class="btn  btn-primary btn-sm">
                                                Reset
                                            </a>
                                        @else
                                            <button class="btn  btn-primary btn-sm" disabled>
                                                Reset
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-6 text-end">
                                        @if ($exist && $pembayaran)
                                            <button class="btn  btn-success btn-sm" type="submit">
                                                Save
                                            </button>
                                        @else
                                            <button class="btn  btn-success btn-sm" disabled>
                                                Save
                                            </button>
                                        @endif

                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>






        @foreach ($data as $row)
            <div class="modal fade" tabindex="-1" id="updateItemTemp{{ $row->id }}">
                <form action="{{ url('transaksi/updateItemTemp/' . $row->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                                <h3 class="modal-title">Update Jumlah</h3>


                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>

                            </div>

                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Produk</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="text" class="form-control" name="produk"
                                                value="{{ $row->produk }}" readonly>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-6">
                                        <label for="basic-url" class="form-label">Harga</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="number" class="form-control" name="harga"
                                                value="{{ $row->harga }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="basic-url" class="form-label">Jumlah</label>
                                        <div class="input-group input-group-sm  mb-5">
                                            <input type="number" class="form-control " name="jumlah" min="0"
                                                max="{{ getStokByProdukId($row->produk_id) }}"
                                                value="{{ $row->jumlah }}" required>
                                            @php
                                                $stokTersediaEdit = getStokByProdukId($row->produk_id) - $row->jumlah;
                                            @endphp
                                            @if ($stokTersediaEdit >= 1)
                                                <div class="invalid-feedback"
                                                    style="display: block; margin-top:0.3rem; font-style:italic; color:green">
                                                    Stok tersedia {{ $stokTersediaEdit }}
                                                </div>
                                            @else
                                                <div class="invalid-feedback"
                                                    style="display: block; margin-top:0.3rem; font-style:italic; color:red">
                                                    Stok tersedia {{ $stokTersediaEdit }} (stok habis)
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>




                            </div>


                            <div class="modal-footer"
                                style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                                <button type="button" class="btn btn-light btn-sm  hover-scale"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm  hover-scale">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    @endsection



    @push('scripts')
        <!--Begin Update Jasa -->
        {{-- <script>
            $('.input-barcode').on('change', function() {

                var barcode = $(this).val();
                console.log(barcode);
                $.ajax({
                    type: "get",
                    url: "createTempByBarcodeScanner/" + barcode,
                    dataType: "json",
                    success: function(response) {


                        window.location.reload();
                    }
                });




            });
        </script> --}}

        {{-- 
        <script>
            $('.input-pembayaran').on('keyup', function() {


                var pembayaran = $('#pembayaran').val();
                var total = $('#total-harga').val();
                var diskon = $('#diskon').val();
                var kembalian = (parseInt(pembayaran) - parseInt(total) + parseInt(diskon));



                var html = '<h1>Kembalian : ' + money(kembalian) + '</h1>'
                $('#kembalian-old').hide();
                $('#kembalian-new').html(html);

                // var total = jumlah * harga;
                // $('#total-update-jasa').val(total);




            });
        </script> --}}
        <script>
            $('.input-diskon').on('keyup', function() {


                var diskon = $('#diskon').val();
                $('#diskon').html(diskon);


                var html = '<span class="d-block mb-9" data-kt-pos-element="discount" >' + money(diskon) + '</span>';
                $('#hide-diskon').hide();
                $('#show-diskon').html(html);

                var subtotal = $('#total-harga-display').val();
                console.log(subtotal);

                total = subtotal - diskon;
                $('#hide-total').hide();
                var htmlSubtotal = '<span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total" >' + money(
                        total) +
                    '</span>';
                $('#show-total').html(htmlSubtotal);




            });
        </script>
        <script>
            $('.pilih-produk').on('change', function() {
                var barcode = $(this).val();

                // console.log(barcode);
                $.ajax({
                    type: "get",
                    url: "transaksi/createTempByBarcode/" + barcode,
                    dataType: "json",
                    success: function(response) {
                        window.location.reload();
                    }
                });

            });
        </script>

        <script>
            // $('#button-save').hide();

            $('.pilih-metode-pembayaran').on('change', function() {

                var id = $(this).val();
                console.log(id);

                $.ajax({
                    url: 'updateMetodePembayaran/' + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {

                        // // var pembayaran = response.data;
                        // // if (pembayaran == true) {
                        // //     $('#button-save').show();
                        // // } else {
                        // //     $('#button-save').hide('disabled', false);

                        // // }
                        //     winload
                        window.location.reload();
                    }
                });




            });
        </script>
        <!--End Update Jasa -->
    @endpush
