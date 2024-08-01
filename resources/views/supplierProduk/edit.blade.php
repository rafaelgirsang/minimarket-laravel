@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('supplierProduk/' . segment(3)) }}" method="post">
            @csrf
            @method('PUT')
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
                                    <option value="{{ $supplier->id }}" {{ selected($supplier->id, $data->supplier_id) }}>
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
                                    <option value="{{ $produk->id }}" {{ selected($produk->id, $data->produk_id) }}>
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

                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Harga Beli</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                id="harga_beli" name="harga_beli" value="{{ $data->harga_beli }}" required>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Status</label>
                        <div class="input-group input-group-sm   mb-5">
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active"
                                id="is_active">
                                <option value="">Pilih</option>
                                <option value="Y" {{ selected($data->is_active, 'Y') }}>Aktif
                                </option>
                                <option value="N" {{ selected($data->is_active, 'N') }}>Tidak Aktif
                                </option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>


            </div>
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('supplierProduk') }}" class="btn btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Save
                </button>

            </div>
        </form>
    </div>
@endsection
