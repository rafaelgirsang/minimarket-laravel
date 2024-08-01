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
                                id="barcode" name="barcode" value="{{ old('barcode') }}" autofocus>
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
                        <label for="basic-url" class="form-label">Supplier</label>
                        <div class="input-group input-group-sm  mb-5" id="show-add-supplier">
                            <input type = "text" class = "form-control" id = "supplier_baru" name = "supplier_baru">
                            <select class="form-select" name="supplier_lama" id="supplier_lama">
                                <option value="">Pilih</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-1">
                        <label for="basic-url" class="form-label" style="color: white">Supplier</label>
                        <button type="button" class="btn btn-sm btn-primary add-supplier" id="button-add">+</button>

                        <button type="button" class="btn btn-sm btn-info replace-supplier"
                            id="button-replace">=</button>
                    </div>


                </div>


            </div>
            <input type="hidden" name="produk_id" id="produk_id">
            <input type="hidden" name="stok_tersedia" id="stok_tersedia">
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('produk') }}" class="btn  btn-primary btn-sm hover-scale">
                    Kembali
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Simpan
                </button>

            </div>
        </form>
    </div>
@endsection



@push('scripts')
    <script type="text/javascript">
        $('#button-replace').hide();
        $('#supplier_baru').hide();

        $('.barcode').on('change', function() {

            const barcode = $(this).val();

            $.ajax({
                type: "GET",
                url: base_url() + `/produk/getProdukByBarcode/` + barcode,
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

                        $('#supplier_lama').html(supplier);

                    }
                }

            });
        });

        $('.add-supplier').on('click', function() {


            $('#supplier_lama').hide()
            $('#button-add').hide()
            $('#supplier_baru').show()
            $('#button-replace').show();


        });

        $('.replace-supplier').on('click', function() {


            $('#supplier_lama').show()
            $('#button-add').show()
            $('#supplier_baru').hide()
            $('#button-replace').hide();


        });
    </script>
@endpush
