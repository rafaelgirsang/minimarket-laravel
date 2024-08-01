@extends('layout.app')

@push('meta-refresh')
    <meta http-equiv="refresh" content="120">
@endpush
@section('content')
    <!--end::Header-->
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                {{-- <a href="{{ url('transaksi/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    Tambah
                </a> --}}
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
                                            <option {{ crypt_open(request('searchBy')) == 'nama' ? 'Selected' : '' }}
                                                value="{{ crypt_make('nama') }}">Nama</option>
                                            <option {{ crypt_open(request('searchBy')) == 'jasa' ? 'Selected' : '' }}
                                                value="{{ crypt_make('jasa') }}">Jasa</option>



                                        </select>
                                        <label for="floatingSelect" style="padding-left:10px">Search By</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" id="floatingSelect"
                                            aria-label="Floating label select example" style="font-size:1rem" type="date"
                                            name="tanggal" value="{{ request('tanggal') }}">
                                        <label for="floatingSelect" style="padding-left:10px">Tanggal</label>
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
                                <a href="{{ url()->current() }}" type="reset"
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
                                    <th class="w-40px">No</th>
                                    <th>Nama Item</th>

                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>



                                    {{-- <th class="w-40px">#</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>



                                        <td>{{ $row->produk }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>{{ money($row->harga) }}</td>
                                        <td>{{ money($row->harga * $row->jumlah) }}</td>





                                    </tr>
                                    @php
                                        $total[] = $row->harga * $row->jumlah;
                                    @endphp
                                @endforeach

                                <tr>
                                    <th colspan="4" class="text-end">Subtotal</th>
                                    <th>{{ money(array_sum($total)) }}</th>

                                </tr>
                                <tr>
                                    <th colspan="4" class="text-end">Administrasi</th>
                                    <th>-{{ money($transaksi->administrasi) }}</th>

                                </tr>
                                <tr>
                                    <th colspan="4" class="text-end">Diskon</th>
                                    <th>-{{ money($transaksi->diskon) }}</th>

                                </tr>
                                <tr>
                                    <th colspan="4" class="text-end fs-2">Total Harga</th>
                                    <th class="fs-2">
                                        {{ money(array_sum($total) - $transaksi->administrasi - $transaksi->diskon) }}</th>

                                </tr>





                            </tbody>
                        </table>

                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
