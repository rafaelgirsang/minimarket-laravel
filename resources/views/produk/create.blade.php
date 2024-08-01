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
                    <div class="col-md-12">
                        <label for="basic-url" class="form-label">Kategori</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id"
                                id="kategori_id" required>
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
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Nama Produk</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required>
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Barcode</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode"
                                name="barcode" value="{{ old('barcode') }}" required>
                            @error('barcode')
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
                            <input type="number" class="form-control @error('keterangan') is-invalid @enderror"
                                id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" required>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Harga Jual</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('jumlah_stok') is-invalid @enderror"
                                id="jumlah_stok" name="jumlah_stok" value="{{ old('jumlah_stok') }}" required>
                            @error('jumlah_stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Supplier</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id"
                                id="kategori_id" required>
                                <option value="">Pilih</option>
                                @foreach ($supplier as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->nama_supplier }}
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
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Jumlah</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('jumlah_stok') is-invalid @enderror"
                                id="jumlah_stok" name="jumlah_stok" value="{{ old('jumlah_stok') }}" required>
                            @error('jumlah_stok')
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
