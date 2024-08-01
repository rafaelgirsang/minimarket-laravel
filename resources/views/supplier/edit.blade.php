@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('supplier/' . segment(3)) }}" method="post">
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
                        <label for="basic-url" class="form-label">Nama Supplier</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                                id="nama_supplier" name="nama_supplier" value="{{ $data->nama_supplier }}" required>
                            @error('nama_supplier')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Telpon</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="number" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                                name="telpon" value="{{ $data->telpon }}" required>
                            @error('telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <label for="basic-url" class="form-label">Alamat</label>
                        <div class="input-group input-group-sm  mb-5">
                            <textarea type="number" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                required>{{ $data->alamat }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>


            </div>
            <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

                <a href="{{ url('supplier') }}" class="btn btn-primary btn-sm hover-scale">
                    Back
                </a>

                <button type="submit" class="btn  btn-success btn-sm hover-scale">
                    Save
                </button>

            </div>
        </form>
    </div>
@endsection
