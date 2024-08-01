@extends('layout.app')
@section('content')

    <div class="row mb-2">
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
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($omset) }}</span>
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
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($profit) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Profit Bulan Ini</span>
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
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($cash) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Cash Bulan Ini</span>
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
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ money($qris) }}</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->

                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">QRIS Bulan Ini</span>
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


            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover border rounded w-100 text-center">
                            <thead>
                                <tr class="tb-head bg-primary text-light-primary">
                                    <th style="width:50px">No</th>



                                    <th>Tanggal</th>
                                    <th>HPP</th>
                                    <th>Omset</th>
                                    <th>Profit</th>





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
                                            <td>{{ money($row->hpp) }}</td>
                                            <td>{{ money($row->omset) }}</td>
                                            <td>{{ money($row->profit) }}</td>


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
        <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

            <a href="{{ url('produk') }}" class="btn btn-primary btn-sm hover-scale">
                Back
            </a>

            {{-- <button type="submit" class="btn  btn-success btn-sm hover-scale">
                Save
            </button> --}}

        </div>
    </div>





@endsection
