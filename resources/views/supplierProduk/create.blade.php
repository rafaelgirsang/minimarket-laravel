@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('supplierProduk') }}" method="post">
            @csrf
            <div class="card-header card-header-form">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body py-5">
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Supplier</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id"
                                id="supplier_id" required>
                                <option value="">Pilih</option>
                                @foreach ($supplier as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Produk</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('produk_id') is-invalid @enderror" name="produk_id"
                                id="produk_id" required>
                                <option value="">Pilih</option>
                                @foreach ($produk as $produk)
                                    <option value="{{ $produk->id }}"
                                        {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>



                <div class="row">

                    <div class="col-md-12">
                        <label for="basic-url" class="form-label">Harga Beli</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" required>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>


            </div>
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('produk') }}" class="btn  btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Add
                </button>

            </div>
        </form>
    </div>
@endsection
