@extends('layout.app')

@section('content')
    <div class="card  shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Form Tambah</h3>
            <div class="card-toolbar">
            </div>
        </div>
        <div class="card-body py-5">
            <form action="{{ url('cabang') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Nama Cabang</label>
                        <div class="input-group  mb-5">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Kode</label>
                        <div class="input-group  mb-5">
                            <input type="text" class="form-control" name="kode" value="{{ $newKode }}" required
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Alamat</label>
                        <div class="input-group  mb-5">
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Telpon</label>
                        <div class="input-group  mb-5">
                            <input type="number" class="form-control" name="telp" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <a href="{{ url('cabang') }}" class="btn  btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn  btn-success btn-sm" onclick="test()">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
