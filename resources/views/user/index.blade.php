@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('user/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body py-5">



            <form method="get">
                <div class="d-flex d-flex-search mb-4">
                    <input type="text" class="form-control form-control-sm input-btn" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-sm btn-primary btn-input"><i class="bi bi-search"></i></button>
                    <a href="#" class="btn btn-sm btn-flex btn-success fw-bold" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end" style="margin-left: 10px">
                        <i class="ki-duotone ki-filter fs-6  ">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i></a>

                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                        id="kt_menu_641ac3feccaa7">
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                           
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="searchBy">
                                            <option {{ crypt_open(request('searchBy')) == '' ? 'Selected' : '' }}
                                                value="">Pilih</option>
                                            <option {{ crypt_open(request('searchBy')) == 'nama_user' ? 'Selected' : '' }}
                                                value="{{ crypt_make('nama_user') }}">Nama</option>
                                            <option
                                                {{ crypt_open(request('searchBy')) == 'jenis_kelamin' ? 'Selected' : '' }}
                                                value="{{ crypt_make('gender') }}">Gender</option>
                                            <option {{ crypt_open(request('searchBy')) == 'telpon' ? 'Selected' : '' }}
                                                value="{{ crypt_make('telpon') }}">Telpon</option>
                                            <option {{ crypt_open(request('searchBy')) == 'email' ? 'Selected' : '' }}
                                                value="{{ crypt_make('email') }}">Email</option>
                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Search By</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12 mb-5">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="gender">
                                            <option value="">Pilih</option>
                                            <option value="L" {{ selected(request('gender'), 'L') }}>Laki-Laki
                                            </option>
                                            <option value="P" {{ selected(request('gender'), 'P') }}>Perempuan
                                            </option>
                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Jenis Kelamin</label>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mb-5">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="role">

                                            <option value="">Pilih</option>
                                            @foreach ($role as $rowRole)
                                                <option value="{{ $rowRole->role }}"
                                                    {{ selected(request('role'), $rowRole->role) }}>
                                                    {{ $rowRole->role }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Role</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="status">
                                            <option value="">Pilih</option>
                                            <option value="Y" {{ request('status') == 'Y' ? 'Selected' : '' }}>Aktif
                                            </option>
                                            <option value="N" {{ request('status') == 'N' ? 'Selected' : '' }}>Tidak
                                                Aktif</option>
                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Status</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="show">

                                            <option value="">Pilih</option>
                                            <option value="10" {{ selected(request('show'), '10') }}>10</option>
                                            <option value="25" {{ selected(request('show'), '25') }}>25</option>
                                            <option value="50" {{ selected(request('show'), '50') }}>50</option>
                                            <option value="100" {{ selected(request('show'), '100') }}>100</option>
                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Show Data</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ url('user') }}" type="reset"
                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset</a>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>

                </div>
            </form>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover border rounded w-100 text-center" sty>
                            <thead>
                                <tr class="tb-head bg-primary text-light-primary">
                                    <th style="width:50px">No</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Telpon</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    
                                    <th>Status</th>
                                    <th style="width:50px">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty(checkData($data)))
                                    @php
                                        $no = number($data);
                                    @endphp
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_user }}</td>
                                            <td>{{ $row->gender == 'L' ? 'Laki - laki' : ($row->gender == 'P' ? 'Perempuan' : '-') }}</td>
                                            <td>{{ $row->telpon }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->role->role }}</td>
                                          
                                            <td>
                                                @if ($row->is_active == 'Y')
                                                    <span class="badge badge-success" style="width: 80px">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger" style="width: 80px">Tidak
                                                        Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="droppdown btn btn-sm btn-light btn-flex btn-center"
                                                    style="border-radius:50px; padding:7px" data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">
                                                    <i class="bi bi-three-dots" style="padding-right:0px"></i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ url('user/edit/' . crypt_make($row->id)) }}"
                                                            class="menu-link px-3">Edit</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="{{ url('user/editSetGaji/' . crypt_make($row->id)) }}"
                                                            class="menu-link px-3">Set Gaji</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="{{ url('user/presensi/' . crypt_make($row->id)) }}"
                                                            class="menu-link px-3">Presensi</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <form action="{{ url('user/' . crypt_make($row->id)) }}"
                                                        method="post" id="form-delete-{{ $row->id }}">
                                                        <div class="menu-item px-3">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="destroy({{ $row->id }})"
                                                                class="menu-link px-3">Delete</a>
                                                        </div>
                                                    </form>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">
                                            <span class="text-muted"><i>Empty data</i><span>
                                        </td>
                                    </tr>
                                @endif




                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $data->onEachSide(1)->appends(Request::except('page'))->links() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
