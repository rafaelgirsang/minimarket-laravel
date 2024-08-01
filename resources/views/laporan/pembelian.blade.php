@extends('layout.app')
@section('content')

    <div class="row mb-3">

        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span
                                class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($totalPendapatan->omset) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Omset Bulan Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Rp</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($total->total) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Pembelian Bulan Ini</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($maksimalBelanja) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                            <button class="btn btn-sm btn-primary align-self-end" data-bs-toggle="modal"
                                data-bs-target="#belanja" style="float: right">+</button>
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Maksimal Belanja</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-md-40 mb-3 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($aset->total_aset) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Total Aset Produk</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>

            </div>
        </div>

    </div>

    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body py-5">
            <form action="" method="get">
                <div class="row">
                    <div class="col-2">

                        <div class="input-group input-group-sm  mb-5">
                            <input type="date" class="form-control" name="tanggal_awal" value="{{ $tanggalAwal }}"
                                required>

                        </div>

                    </div>
                    <div class="col-1 text-center">
                        <label for="" style="padding-top: 5px">s/d</label>
                    </div>
                    <div class="col-2">
                        <div class="input-group input-group-sm  mb-5">
                            <input type="date" class="form-control" name="tanggal_akhir" value="{{ $tanggalAkhir }}"
                                required>
                        </div>

                    </div>
                    <div class="col-2 text-center">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i></button>
                        <a class="btn btn-secondary btn-sm" href="{{ url()->current() }}"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </form>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover border rounded w-100 text-center">
                            <thead>
                                <tr class="tb-head bg-primary text-light-primary">
                                    <th style="width:50px">No</th>



                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Supplier</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>





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
                                            <td>{{ formatTanggal($row->tanggal) }}</td>
                                            <td style="text-align: left">{{ $row->nama_produk }}</td>
                                            <td style="text-align: left">{{ $row->nama_supplier }}</td>
                                            <td>{{ money($row->stok) }}</td>
                                            <td class="text-end">{{ money($row->harga_beli) }}</td>
                                            <td class="text-end">{{ money($row->total) }}</td>


                                        </tr>


                                        @php
                                            $totalUang[] = $row->total;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="6"></td>
                                        <td class="text-end">{{ money(array_sum($totalUang)) }}</td>
                                    </tr>
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
        <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

            {{-- <a href="{{ url('laporan/pembelian') }}" class="btn btn-primary btn-sm hover-scale">
                Back
            </a> --}}

            {{-- <button type="submit" class="btn  btn-success btn-sm hover-scale">
                Save
            </button> --}}

        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="belanja">
        <form action="{{ url('laporan/ambilBelanja') }}" method="POST">
            @csrf

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                        <h3 class="modal-title">Maksimal Belanja</h3>

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
                                <label for="basic-url" class="form-label">Saldo</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="text" class="form-control" name="saldo"
                                        value="{{ $maksimalBelanja }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basic-url" class="form-label">Jumlah Dibelanjakan</label>
                                <div class="input-group input-group-sm  mb-5">
                                    <input type="number" class="form-control" name="jumlah" placeholder="0"
                                        min="0">
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
