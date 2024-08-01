@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('produk') }}" method="post">
            @csrf
            <div class="card-header card-header-form">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body py-5">
                <div class="row">
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Barcode</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control  barcode" id="barcode" name="barcode" value=""
                                autocomplete="off" required>

                            <div class="invalid-feedback">
                                Produk sudah ada! , Produk <span id="nama-produk"></span>
                            </div>

                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Nama Produk</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text"
                                class="form-control @error('nama_produk') is-invalid @enderror nama_produk" id="nama_produk"
                                name="nama_produk" value="{{ old('nama_produk') }}" required>
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Kategori</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror kategori_id"
                                name="kategori_id" id="kategori_id" required>
                                <option value="">Pilih</option>
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <label for="basic-url" class="form-label">Harga Beli</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('keterangan') is-invalid @enderror harga_beli"
                                id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" required>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Harga Jual</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" min="0"
                                class="form-control @error('harga_jual') is-invalid @enderror harga_jual" id="harga_jual"
                                name="harga_jual" value="{{ old('harga_jual') }}" required>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Stok</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror stok"
                                id="stok" name="jumlah_stok" value="{{ old('stok') }}" required>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-5 ">
                        <label for="basic-url" class="form-label" id="title-supplier">Supplier</label>
                        <div class="input-group input-group-sm  mb-5" id="show-add-supplier">
                            <input type = "text" class = "form-control" id = "supplier-baru" name = "supplier_baru">
                            <select class="form-select" name="supplier_lama" id="supplier-lama" required>
                                <option value="">Pilih</option>
                                @foreach ($supplier as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>


                        </div>
                    </div>
                    <div class="col-1">

                        <button type="button" class="btn btn-sm btn-primary btn-supplier-lama" id="btn-supplier-lama"
                            style="margin-top: 25px"><i class="fa-solid fa-arrows-rotate"></i></button>

                        <button type="button" class="btn btn-sm btn-success btn-supplier-baru" id="btn-supplier-baru"
                            style="margin-top: 25px"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div>


                </div>


            </div>

            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('produk') }}" class="btn  btn-primary btn-sm hover-scale">
                    Kembali
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale btn-simpan">
                    Simpan
                </button>

            </div>
        </form>
    </div>
@endsection



@push('scripts')
    <script>
        function baseUrl() {
            var url;
            var hostname = window.location.hostname;
            if (hostname == 'localhost') {
                url = window.location.origin + '/tokoresta';
            } else {
                url = '';
            }
            return url;
        }
    </script>
    <script type="text/javascript">
        $('#btn-supplier-baru').hide();
        $('#supplier-baru').hide();



        const barcode = $('#barcode').val();

        console.log(barcode);
        $('.barcode').on('keyup', function() {

            const barcode = $(this).val();

            $.ajax({
                type: "GET",
                url: baseUrl() + `/produk/getProdukByBarcode/` + barcode,
                data: {
                    barcode: barcode
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {

                        $('.barcode').addClass('is-invalid');
                        $('.btn-simpan').addClass('disabled');
                        $("input").attr("disabled", true);
                        $("select").attr("disabled", true);
                        $(".barcode").attr("disabled", false);
                        $(".btn-supplier-lama").addClass("disabled");
                        $(".btn-supplier-baru").addClass("disabled");
                        $("#nama-produk").html(data.data.produk.nama_produk);
                    } else {
                        $('.barcode').removeClass('is-invalid');
                        $('.btn-simpan').removeClass('disabled');
                        $("input").attr("disabled", false);
                        $("select").attr("disabled", false);
                        $("#nama-produk").html('');
                        $(".btn-supplier-lama").removeClass("disabled");
                        $(".btn-supplier-baru").removeClass("disabled");

                    }
                }

            });
        });


        $('.btn-supplier-lama').on('click', function() {



            $('#supplier-lama').hide()
            $('#supplier-baru').show()

            $('#supplier-lama').val('')
            $('#supplier-baru').val('')



            $('#btn-supplier-lama').hide()
            $('#btn-supplier-baru').show()

            $('#supplier-lama').prop('required', false);
            $('#supplier-baru').prop('required', true);


            $('#title-supplier').html('Supplier Baru');



        });



        $('.btn-supplier-baru').on('click', function() {



            $('#supplier-lama').show()
            $('#supplier-baru').hide()

            $('#supplier-lama').val('')
            $('#supplier-baru').val('')



            $('#btn-supplier-lama').show()
            $('#btn-supplier-baru').hide()

            $('#supplier-lama').prop('required', true);
            $('#supplier-baru').prop('required', false);

            $('#title-supplier').html('Supplier Lama');

        });
    </script>
@endpush
