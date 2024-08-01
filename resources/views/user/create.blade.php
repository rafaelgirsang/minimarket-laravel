@extends('layout.app')
@section('content')
    <div class="card  shadow-sm">
        <form action="{{ url('user') }}" method="post">
            @csrf
            <div class="card-header card-header-form">
                <h3 class="card-title">{{ $title}}</h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body py-5">

                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Nama</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{old('nama')}}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Nik</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" value="{{old('nik')}}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="basic-url" class="form-label">Tempat Lahir</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                name="tempat_lahir" value="{{old('tempat_lahir')}}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="basic-url" class="form-label">Tanggal Lahir</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Jenis Kelamin</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="jenis_kelamin">
                                <option value="">Pilih</option>
                                <option value="P" {{  old('jenis_kelamin')  == 'P' ? 'selected' : '' }}>Laki - Laki
                                </option>
                                <option value="L" {{  old('jenis_kelamin')  == 'L' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
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
                                id="telpon" value="{{  old('telpon')  }}">
                            @error('telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Alamat</label>
                        <div class="input-group input-group-sm mb-5">
                            <textarea class="form-control textarea-costum @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                rows="1">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Email</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="text" class="form-control @error('email') is-invalid @enderror " name="email"
                                id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Password</label>
                        <div class="input-group input-group-sm  mb-5">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Cabang</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select  @error('cabang_id') is-invalid @enderror" name="cabang_id"
                                id="cabang_id">
                                <option value="">Pilih</option>
                                @foreach ($cabang as $rowCabang)
                                    <option value="{{ $rowCabang->id }}"
                                        {{ old('cabang_id') == $rowCabang->id ? 'selected' : '' }}>{{ $rowCabang->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cabang_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url" class="form-label">Role</label>
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id"
                                id="role_id">
                                <option value="">Pilih</option>
                                @foreach ($role as $rowRole)
                                    <option value="{{ $rowRole->id }}"
                                        {{ old('role_id') == $rowRole->id ? 'selected' : '' }}>{{ $rowRole->role }}
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
                </div>

            </div>
            <div class="card-footer card-footer-form">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ URL::previous() }}" class="btn  btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn  btn-success btn-sm">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
