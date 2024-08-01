@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('user/' . crypt_make($data->id)) }}" method="post">
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
                        <label for="basic-url" class="form-label">Nama</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user"
                                name="nama_user" value="{{ $data->nama_user }}">
                            @error('nama_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Gender</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                id="gender">
                                <option value="">Pilih</option>
                                <option value="L" {{ selected($data->gender,'L') }}>Laki - Laki
                                </option>
                                <option value="P" {{ selected($data->gender,'P') }}>Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                   
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Telpon</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('telpon') is-invalid @enderror" name="telpon"
                                id="telpon" value="{{ $data->telpon }}">
                            @error('telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Email</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('email') is-invalid @enderror " name="email"
                                id="email" value="{{ $data->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                  
                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Role</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id"
                                id="role_id">
                                <option value="">Pilih</option>
                                @foreach ($role as $rowRole)
                                    <option value="{{ $rowRole->id }}"
                                        {{ $data->role_id == $rowRole->id ? 'selected' : '' }}>{{ $rowRole->role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Status</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active"
                                id="is_active">
                                <option value="">Pilih</option>
                                <option value="Y" {{ $data->is_active == 'Y' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="N" {{ $data->is_active == 'N' ? 'selected' : '' }}>Tidak Aktif
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
            <div class="card-footer card-footer-form">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('user') }}" class="btn  btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn  btn-success btn-sm" >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
 
    
@endsection
