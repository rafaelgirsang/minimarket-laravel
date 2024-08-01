@extends('layout.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endpush
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('transaksi') }}" method="post">
            @csrf
            <div class="card-header card-header-form">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body ">
                <div class="row">

                    <div class="col-6">
                        <label for="basic-url" class="form-label">Nama</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="typeahead  form-control @error('nama') is-invalid @enderror"
                                id="customer" name="nama" value="{{ old('nama') }}" placeholder="Nama customer"
                                required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="customer_id" id="customer_id" required>

                    <div class="col-6">
                        <label for="basic-url" class="form-label">Telpon</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                                name="telpon" value="{{ old('telpon') }}" placeholder="Nomor telpon" required>
                            @error('telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="kt_accordion_3_item_2" class="collapse show fs-6" data-bs-parent="#kt_accordion_3">
                            <!--begin::Repeater-->
                            <div id="layanan">


                                <div class="form-group" id="row-clone">

                                    <div data-repeater-list="kt_docs_repeater_basic">
                                        <div data-repeater-item>
                                            <div class="form-group row">

                                                <div class="col-3">
                                                    <label for="basic-url" class="form-label">Jasa</label>
                                                    <div class="input-group input-group-sm  mb-5">
                                                        <select
                                                            class="form-select jasa @error('id_jasa') is-invalid @enderror"
                                                            name="id_jasa" id="id_jasa[]" required>
                                                            <option value="">Pilih</option>
                                                            @foreach ($jasa as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('id_jasa') == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->jasa }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_jasa')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <label for="basic-url" class="form-label">Harga</label>
                                                    <div class="input-group input-group-sm  mb-5">
                                                        <input type="number"
                                                            class="form-control @error('harga') is-invalid @enderror"
                                                            id="harga" name="harga" min="0" value="0">
                                                        @error('harga')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <label for="basic-url" class="form-label">Jumlah</label>
                                                    <div class="input-group input-group-sm  mb-5">
                                                        <input type="text"
                                                            class="form-control jumlah @error('jumlah') is-invalid @enderror"
                                                            id="jumlah[]" name="jumlah" value="0"
                                                            value="{{ old('jumlah') }}" min="0" required>
                                                        @error('jumlah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <label for="basic-url" class="form-label">Subtotal</label>
                                                    <div class="input-group input-group-sm  mb-5">
                                                        <input type="number"
                                                            class="form-control @error('subtotal') is-invalid @enderror"
                                                            id="subtotal[]" name="subtotal" min="0" value="0"
                                                            value="{{ old('subtotal') }}" required>
                                                        @error('subtotal')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div> <input type="hidden" name="deadline" id="deadline[]">


                                                <div class="col-1">
                                                    <a href="javascript:;" data-repeater-delete
                                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8 delete-item">
                                                        <i class="ki-duotone ki-trash fs-5"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span><span
                                                                class="path5"></span></i>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Form group-->

                                <!--end::Form group-->
                                <div class="row">
                                    <div class="col-md-12 text-center ">
                                        <div class="form-group ">
                                            <a href="javascript:;" data-repeater-create
                                                class="btn btn-light-primary btn-sm">
                                                <i class="ki-duotone ki-plus fs-3"></i>
                                                Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form group-->

                                <!--end::Form group-->
                            </div>
                            <!--end::Repeater-->
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 total-harga">
                        <label for="basic-url" class="form-label">Total Harga</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('total_harga') is-invalid @enderror"
                                id="total_harga" name="total_harga" value="0" value="{{ old('total_harga') }}"
                                required readonly min="0">
                            @error('total_harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 jenis-pembayaran">
                        <label for="basic-url" class="form-label">Jenis Pembayaran</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select jenis @error('jenis') is-invalid @enderror" id="jenis"
                                name="jenis" required>
                                <option value="">Pilih</option>
                                <option value="1" {{ selected(old('jenis'), '1') }}>Wait</option>
                                <option value="2" {{ selected(old('jenis'), '2') }}>DP</option>
                                <option value="3" {{ selected(old('jenis'), '3') }}>Lunas
                                </option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 jumlah-bayar" id="jumlah-bayar">

                    </div>

                    <div class="col-md-3 kembali" id="kembali">

                    </div>

                </div>


                <!--end::Accordion-->
            </div>

            <input type="hidden" name="cabang_id" value="1">

            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ URL::previous() }}" class="btn  btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Add
                </button>

            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        url = window.location.origin;
        host = window.location.hostname;
        console.log(url);
        console.log(host);
        var path = "getCustomerAutocomplate";
        $("#customer").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },

                    success: function(data) {
                        response(data);

                    }

                });
            },
            select: function(event, ui) {

                $('#customer').val(ui.item.nama);
                $('#customer_id').val(ui.item.id);
                $('#telpon').val(ui.item.telpon);
                console.log(ui.item);
                return false;

            }

        });
    </script>

    <script src="{{ base_url('/') }}assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>

    <script>
        $('#layanan').repeater({
            initEmpty: false,



            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#layanan').change(function() {
                const jasa = $("select[id='id_jasa[]']").map(function() {
                    return $(this).val();
                }).get();
                var total = [];
                for (let i = 0; i < jasa.length; i++) {
                    $.ajax({
                        url: base_url() + `/transaksi/getJasaById/` + jasa[i],
                        method: 'get',
                        dataType: "json",
                        success: function(data) {
                            $('input[name="kt_docs_repeater_basic[' + i + '][harga]"]').val(data
                                .harga);
                            $('input[name="kt_docs_repeater_basic[' + i + '][deadline]"]').val(
                                data
                                .deadline);
                            const jumlah = $('input[name="kt_docs_repeater_basic[' + i +
                                    '][jumlah]"]')
                                .val();
                            const subtotal = jumlah * data.harga;
                            total[i] = subtotal;
                            $('input[name="kt_docs_repeater_basic[' + i + '][subtotal]"]')
                                .val(Math.round(subtotal));


                            let totalHarga = total.reduce((val, nilaiSekarang) => {
                                return val + nilaiSekarang
                            }, 0);
                            $('#total_harga').val(totalHarga);

                            //pembayaran

                            const jumlahBayar = $('#jumlah_bayar').val();
                            const kurangDp = totalHarga - jumlahBayar;

                            $('#kurang_dp').val(kurang_dp);


                        }

                    });
                    $('.jumlah').keyup(function() {
                        const jumlah = $('input[name="kt_docs_repeater_basic[' + i + '][jumlah]"]')
                            .val();
                        const harga = $('input[name="kt_docs_repeater_basic[' + i + '][harga]"]')
                            .val();
                        const subtotal = jumlah * harga;
                        total[i] = subtotal;

                        $('input[name="kt_docs_repeater_basic[' + i + '][subtotal]"]')
                            .val(Math.round(subtotal));
                        let totalHarga = total.reduce((val, nilaiSekarang) => {
                            return val + nilaiSekarang
                        }, 0);
                        $('#total_harga').val(totalHarga);


                        const jumlahBayar = $('#jumlah_bayar').val();
                        const kurang_dp = totalHarga - jumlahBayar;


                        $('#kurang_dp').val(kurang_dp);

                    });




                }

            });

            $('.jumlah-bayar').keyup(function() {

                const jumlahBayar = $('#jumlah_bayar').val();
                const totalHarga = $('#total_harga').val();
                console.log(jumlahBayar);
                const kurang_dp = totalHarga - jumlahBayar;
                $('#kurang_dp').val(kurang_dp);

                if (jumlahBayar > totalHarga) {

                }


            });

            $('.jenis').change(function() {

                const jenisPembayaran = $(this).val();




                if (jenisPembayaran == 1) {
                    $('.jumlah-bayar').hide();
                    $('.kembali').hide();
                    $('.total-harga').removeClass('col-md-3');
                    $('.total-harga').addClass('col-md-6');

                    $('.jenis-pembayaran').removeClass('col-md-3');
                    $('.jenis-pembayaran').addClass('col-md-6');
                } else if (jenisPembayaran == 2) {
                    var jumlahDp = '';
                    jumlahDp += ' <label for="basic-url" class="form-label">Jumlah DP</label>';
                    jumlahDp += '<div class="input-group input-group-sm  mb-5">';
                    jumlahDp +=
                        '<input type="number" class="form-control bayar"  id="jumlah_bayar" name="bayar_dp" value="0"   required>';

                    jumlahDp += '</div>';


                    var kurang_dp = '';
                    kurang_dp += ' <label for="basic-url" class="form-label">Kurang Pembayaran</label>';
                    kurang_dp += '<div class="input-group input-group-sm  mb-5">';
                    kurang_dp +=
                        '<input type="number" class="form-control "  id="kurang_dp" name="kurang_dp"   value="0"  required>';

                    kurang_dp += '</div>';
                    $('#jumlah-bayar').html(jumlahDp);
                    $('#kembali').html(kurang_dp);
                    $('.jumlah-bayar').show();
                    $('.kembali').show();

                    $('.jumlah-bayar').removeClass('col-md-4');
                    $('.jumlah-bayar').addClass('col-md-3');

                    $('.total-harga').removeClass('col-md-6');
                    $('.total-harga').removeClass('col-md-4');
                    $('.total-harga').addClass('col-md-3');

                    $('.jenis-pembayaran').removeClass('col-md-6');
                    $('.jenis-pembayaran').removeClass('col-md-4');
                    $('.jenis-pembayaran').addClass('col-md-3');
                } else if (jenisPembayaran == 3) {


                    $('#jumlah-bayar').hide();
                    $('#kembali').hide();


                    $('.total-harga').removeClass('col-md-3');
                    $('.total-harga').addClass('col-md-6');

                    $('.jenis-pembayaran').removeClass('col-md-4');
                    $('.jenis-pembayaran').removeClass('col-md-3');
                    $('.jenis-pembayaran').addClass('col-md-6');
                }


            });


            $('.delete-item').click(function() {
                console.log('delete item');

            });


        })
    </script>
@endpush
