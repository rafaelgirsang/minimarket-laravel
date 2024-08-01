@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('jurnal/storeJurnal') }}" method="post">
            @csrf
            <div class="card-header card-header-form">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body py-5">



                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Tanggal</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="date" class="form-control @error('nama_produk') is-invalid @enderror"
                                id="nama_produk" name="tanggal" value="{{ old('nama_produk') }}" required>
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Akun</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="debit_id"
                                id="kategori_id" required>
                                <option value="">Pilih</option>
                                @foreach ($debit as $row)
                                    <option value="{{ $row->id }}"}>
                                        {{ $row->akun }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Jumlah</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('keterangan') is-invalid @enderror"
                                id="harga_jual" name="harga" value="{{ old('harga_jual') }}" required>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>





            </div>
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('jurnal') }}" class="btn  btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Add
                </button>

            </div>
        </form>
    </div>
@endsection
