@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('produk/prosesTambahStok') }}" method="post">
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
                            <input type="text" class="form-control @error('barcode') is-invalid @enderror barcode"
                                id="barcode" name="barcode" value="{{ $produk->barcode }}" readonly>
                            @error('barcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-6">
                        <label for="basic-url" class="form-label">Nama Produk</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" readonly disabled>
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
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" value="{{ old('kategori') }}" readonly disabled>
                            @error('kategori')
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
                            <input type="number" class="form-control @error('keterangan') is-invalid @enderror"
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
                                class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                                name="harga_jual" value="{{ old('harga_jual') }}" readonly disabled>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="basic-url" class="form-label">Stok Tersedia</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('stok_tersedia') is-invalid @enderror"
                                id="stok" name="stok" value="{{ old('stok') }}" disabled>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="basic-url" class="form-label">Stok Ditambah</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number"
                                min="0"class="form-control @error('stok_ditambah') is-invalid @enderror"
                                id="stok_ditambah" name="stok_ditambah" value="{{ old('stok_ditambah') }}" required>
                            @error('stok_ditambah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-5 ">
                        <label for="basic-url" class="form-label" id="title-supplier">Supplier Lama</label>
                        <div class="input-group input-group-sm  mb-5" id="show-add-supplier">

                            <select class="form-select" name="supplier_lama" id="supplier-lama" required>
                                <option value="">Pilih</option>
                            </select>

                            <select class="form-select" name="supplier_database" id="supplier-database">
                                <option value="">Pilih</option>

                                @foreach ($supplier as $rowSupplier)
                                    <option value="{{ $rowSupplier->id }}">
                                        {{ $rowSupplier->nama_supplier }}
                                    </option>
                                @endforeach


                            </select>

                            <input type = "text" class = "form-control" id = "supplier-baru" name = "supplier_baru">

                        </div>





                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-sm btn-primary btn-supplier-lama" id="btn-supplier-lama"
                            style="margin-top: 25px"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button type="button" class="btn btn-sm btn-info btn-supplier-database"
                            id="btn-supplier-database" style="margin-top: 25px"><i
                                class="fa-solid fa-arrows-rotate"></i></button>
                        <button type="button" class="btn btn-sm btn-success btn-supplier-baru" id="btn-supplier-baru"
                            style="margin-top: 25px"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div>
                </div>



            </div>
            <input type="hidden" name="produk_id" id="produk_id">
            <input type="hidden" name="stok_tersedia" id="stok_tersedia">
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url()->previous() }}" class="btn  btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
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
        $('#btn-supplier-database').hide();
        $('#btn-supplier-baru').hide();

        $('#supplier-database').hide();
        $('#supplier-baru').hide();

        // $('.barcode').on('change', function() {

        const barcode = $('#barcode').val();

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


                    $('#nama_produk').val(data.data.produk.nama_produk);
                    $('#kategori').val(data.data.produk.kategori);
                    $('#harga_jual').val(data.data.produk.harga_jual);
                    $('#stok').val(data.data.produk.jumlah_stok);
                    $('#stok_tersedia').val(data.data.produk.jumlah_stok);
                    $('#nama_produk').val(data.data.produk.nama_produk);
                    $('#produk_id').val(data.data.produk.id);

                    var supplier = '';
                    supplier += '<option value="">Pilih</option>';
                    for (let i = 0; i < data.data.supplier.length; i++) {
                        const namaSupplier = data.data.supplier[i].nama_supplier;
                        const supplierId = data.data.supplier[i].id;


                        supplier += '<option value="' + supplierId + '">' + namaSupplier +
                            '</option>'

                    }

                    $('#supplier-lama').html(supplier);

                }
            }

        });


        $('.btn-supplier-lama').on('click', function() {



            $('#supplier-lama').hide()
            $('#supplier-database').show()
            $('#supplier-baru').hide()

            $('#supplier-lama').val('')
            // $('#supplier-database').val('')
            $('#supplier-baru').val('')



            $('#btn-supplier-lama').hide()
            $('#btn-supplier-database').show()
            $('#btn-supplier-baru').hide()

            $('#supplier-lama').prop('required', false);
            $('#supplier-database').prop('required', true);
            $('#supplier-baru').prop('required', false);


            $('#title-supplier').html('Supplier Lainya');



        });

        $('.btn-supplier-database').on('click', function() {



            $('#supplier-lama').hide()
            $('#supplier-database').hide()
            $('#supplier-baru').show()

            $('#supplier-lama').val('')
            $('#supplier-database').val('')
            // $('#supplier-baru').val('')



            $('#btn-supplier-lama').hide()
            $('#btn-supplier-database').hide()
            $('#btn-supplier-baru').show()

            $('#supplier-lama').prop('required', false);
            $('#supplier-database').prop('required', false);
            $('#supplier-baru').prop('required', true);


            $('#title-supplier').html('Supplier Baru');



        });

        $('.btn-supplier-baru').on('click', function() {



            $('#supplier-lama').show()
            $('#supplier-database').hide()
            $('#supplier-baru').hide()

            // $('#supplier-lama').val('')
            $('#supplier-database').val('')
            $('#supplier-baru').val('')


            $('#btn-supplier-lama').show()
            $('#btn-supplier-database').hide()
            $('#btn-supplier-baru').hide()

            $('#supplier-lama').prop('required', true);
            $('#supplier-database').prop('required', false);
            $('#supplier-baru').prop('required', false);


            $('#title-supplier').html('Supplier Lama');



        });
    </script>
@endpush
