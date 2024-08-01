@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('produkInventori/' . $data->id) }}" method="post">
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
                        <label for="basic-url" class="form-label">Nama Produk</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required readonly>
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Kategori</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode"
                                name="barcode" value="{{ $kategori->kategori }}" required readonly>
                            @error('barcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <label for="basic-url" class="form-label">Harga Jual</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('keterangan') is-invalid @enderror"
                                id="harga_beli" name="harga_beli" value="{{ $data->harga_beli }}" required>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="basic-url" class="form-label">Jumlah Stok</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('jumlah_stok') is-invalid @enderror"
                                id="jumlah_stok" name="jumlah_stok" value="{{ $data->jumlah_stok }}" required>
                            @error('jumlah_stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="basic-url" class="form-label">Priority</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('jumlah_stok') is-invalid @enderror"
                                id="priority" name="priority" value="{{ $data->priority }}">
                            @error('priority')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>



            </div>
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('produk') }}" class="btn btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Save
                </button>

            </div>
        </form>
    </div>
@endsection
