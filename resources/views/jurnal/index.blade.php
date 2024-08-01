@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary  hover-scale" data-bs-toggle="modal" data-bs-target="#create">
                    Tambah
                </a>
                <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                    style="margin-left: 10px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                    data-kt-menu-overflow="true">

                    <i class="ki-duotone ki-dots-square" style=" font-size:3.4rem"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true" style="">
                    <!--begin::Menu item-->
                    {{-- <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                    </div> --}}
                    <!--end::Menu item-->

                    <!--begin::Menu separator-->
                    <div class="separator mb-3 opacity-75"></div>
                    <!--end::Menu separator-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ url('jurnal/akun') }}" class="menu-link px-3 fs-6 text-gray-900 fw-bold">
                            Akun Jurnal
                        </a>
                    </div>

                </div>
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
                                            <option {{ crypt_open(request('searchBy')) == 'kategori' ? 'Selected' : '' }}
                                                value="{{ crypt_make('kategori') }}">Kategori</option>

                                            <option {{ crypt_open(request('searchBy')) == 'nama_produk' ? 'Selected' : '' }}
                                                value="{{ crypt_make('nama_produk') }}">Produk</option>


                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Search By</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="tahun">
                                            <option {{ request('tahun') == '' ? 'Selected' : '' }} value="">Pilih

                                            </option>
                                            @php
                                                $tahun = getYearAuto();
                                            @endphp
                                            @foreach ($tahun as $tahun)
                                                <option {{ request('tahun') == $tahun->tahun ? 'Selected' : '' }}
                                                    value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                                            @endforeach

                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Tahun</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem"
                                            name="bulan">


                                            <option {{ request('bulan') == '' ? 'Selected' : '' }} value="">Pilih
                                            </option>
                                            <option {{ request('bulan') == '01' ? 'Selected' : '' }} value="01">Januari
                                            </option>
                                            <option {{ request('bulan') == '02' ? 'Selected' : '' }} value="02">
                                                Februari</option>
                                            <option {{ request('bulan') == '03' ? 'Selected' : '' }} value="03">Maret
                                            </option>
                                            <option {{ request('bulan') == '04' ? 'Selected' : '' }} value="04">April
                                            </option>
                                            <option {{ request('bulan') == '05' ? 'Selected' : '' }} value="05">Mei
                                            </option>
                                            <option {{ request('bulan') == '06' ? 'Selected' : '' }} value="06">Juni
                                            </option>
                                            <option {{ request('bulan') == '07' ? 'Selected' : '' }} value="07">Juli
                                            </option>
                                            <option {{ request('bulan') == '08' ? 'Selected' : '' }} value="08">Agustus
                                            </option>
                                            <option {{ request('bulan') == '09' ? 'Selected' : '' }} value="09">
                                                September</option>
                                            <option {{ request('bulan') == '10' ? 'Selected' : '' }} value="10">Oktober
                                            </option>
                                            <option {{ request('bulan') == '11' ? 'Selected' : '' }} value="11">
                                                November</option>
                                            <option {{ request('bulan') == '12' ? 'Selected' : '' }} value="12">
                                                Desember</option>

                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Bulan</label>
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
                                <a href="{{ url('jurnal') }}" type="reset"
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

                                    <th style="width: 100px">Tanggal</th>
                                    <th>Akun</th>


                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    {{-- <th>Saldo</th> --}}


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


                                            <td>{{ $row->tanggal }}</td>
                                            <td class="text-start">{{ $row->akun->akun }}</td>


                                            <td class="text-end">{{ money($row->debit) }}</td>
                                            <td class="text-end">{{ money($row->kredit) }}</td>





                                            <td>
                                                <a href="#"
                                                    class="droppdown btn btn-sm btn-light btn-flex btn-center"
                                                    style="border-radius:50px; padding:7px" data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">
                                                    <i class="bi bi-three-dots" style="padding-right:0px"></i>
                                                </a>

                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true" style="">
                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('produk/edit/' . crypt_make($row->id)) }}"class="menu-link px-3 update">Edit</a>
                                                    </div>
                                                    <!--begin::Menu item-->

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

    <div class="modal fade" tabindex="-1" id="create">
        <form action="{{ url('jurnal/storeJurnal') }}" method="POST">
            @csrf


            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                        <h3 class="modal-title">Tambah</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Tanggal</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="date" class="form-control" name="tanggal"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Akun</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <select class="form-select @error('kategori_id') is-invalid @enderror" name="akun_id"
                                        id="kategori_id" required>
                                        <option value="">Pilih</option>
                                        @foreach ($akun as $row)
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
                                    <input type="text" class="form-control" name="jumlah" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Keterangan</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="keterangan" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer" style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                        <button type="button" class="btn btn-light btn-sm hover-scale"
                            data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary btn-sm hover-scale">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



@endsection
