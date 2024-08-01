@extends('layout.app')
@section('content')
    <div id="test"></div>
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card card-flush shadow-sm" onload="createSuccess()">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('cabang/create') }}" class="btn btn-sm btn-primary">
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body py-5">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover border rounded w-100">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom  border-gray-200 text-center">
                            <th style="width:50px">No</th>
                            <th>Cabang</th>
                            <th>Kode</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            
                            <th style="width:50px">#</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                                        $no = 1;
                                    @endphp
                        @foreach ($cabang as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->kode }}</td>
                                 <td class="text-center">{{ $row->telp }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td class="text-center">
                                    @if ($row->is_active == 'Y')
                                        <span class="badge badge-success" style="width: 80px">Aktif</span>
                                    @else
                                        <span class="badge badge-danger" style="width: 80px">Tidak
                                            Aktif</span>
                                    @endif
                                </td>
                               
                                <td class="text-center">
                                    <a href="#" class="droppdown btn btn-sm btn-light btn-flex btn-center"
                                        style="border-radius:50px; padding:7px" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="bi bi-three-dots" style="padding-right:0px"></i>

                                        {{-- <i
                                            class="ki-duotone ki-dots-circle fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                        </i> --}}

                                        {{-- <i class="ki-duotone ki-down-square fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        </i> --}}
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true" style="">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ url('cabang/edit/' . $row->id) }}" class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        @if($row->id != 1)
                                        <form action="{{ url('cabang/' . $row->id) }}" method="post"
                                            id="form-delete-{{ $row->id }}">
                                            <div class="menu-item px-3">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="destroy({{ $row->id }})" class="menu-link px-3">Delete</a>
                                            </div>
                                        </form>
                                        @endif
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div class="card-footer">

        </div>
    </div>


@endsection
