@extends('layout.app');

@section('content')
<div class="card  shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Form Edit</h3>
        <div class="card-toolbar">         
        </div>
    </div>
    <div class="card-body py-5">
        <form action="{{ url('cabang/'.$cabang->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="basic-url" class="form-label">Nama Cabang</label>
                    <div class="input-group  mb-5">                        
                        <input type="text" class="form-control" name="nama" value="{{ $cabang->nama}}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="basic-url" class="form-label">Kode</label>
                    <div class="input-group  mb-5">                        
                        <input type="text" class="form-control" name="kode"  value="{{ $cabang->kode}}" readonly >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="basic-url" class="form-label">Alamat</label>
                    <div class="input-group  mb-5">                        
                        <input type="text" class="form-control" name="alamat"  value="{{ $cabang->alamat}}"  required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="basic-url" class="form-label">Telp</label>
                    <div class="input-group  mb-5">                        
                        <input type="number" class="form-control" name="telp"  value="{{ $cabang->telp}}"  required>
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-md-12">
                        <label for="basic-url" class="form-label">Status</label>
                        <div class="input-group   mb-5">
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active"
                                id="is_active">
                                <option value="">Pilih</option>
                                <option value="Y" {{ $cabang->is_active == 'Y' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="N" {{ $cabang->is_active == 'N' ? 'selected' : '' }}>Tidak Aktif
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
            
            <div class="row">
                <div class="col-6">
                    <a href="{{url('cabang')}}" class="btn  btn-primary ">
                        Back
                    </a>
                </div>
                <div class="col-6 text-end">
                    <button type="submit" class="btn  btn-success ">
                        Save
                    </button>
                </div>
            </div> 
          


        </form>
    </div>
</div>
@endsection