@extends('layout.app')
@section('content')
    <div class="d-flex d-grid flex-wrap  justify-content-evenly ">


        {{-- <div class="d-flex flex-row-fluid" style="padding-right: 10px">
            <a href="#" class="card hover-elevate-up shadow-sm parent-hover mb-4">
                <div class="card-body  " style="">
                    <i class="ki-duotone ki-rocket fs-1"><span class="path1"></span><span class="path2"></span></i>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                        1k
                    </span>
                </div>
            </a>
        </div>
        <div class="d-flex flex-row-fluid" style="padding-right: 10px">
            <a href="#" class="card hover-elevate-up shadow-sm parent-hover mb-4">
                <div class="card-body  " style="">
                    <i class="ki-duotone ki-rocket fs-1"><span class="path1"></span><span class="path2"></span></i>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                        1k
                    </span>
                </div>
            </a>
        </div>
        <div class="d-flex flex-row-fluid" style="padding-right: 10px">
            <a href="#" class="card hover-elevate-up shadow-sm parent-hover mb-4">
                <div class="card-body  " style="">
                    <i class="ki-duotone ki-rocket fs-1"><span class="path1"></span><span class="path2"></span></i>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                        1k
                    </span>
                </div>
            </a>
        </div>
        <div class="d-flex flex-row-fluid" style="padding-right: 10px">
            <a href="#" class="card hover-elevate-up shadow-sm parent-hover mb-4">
                <div class="card-body  " style="">
                    <i class="ki-duotone ki-rocket fs-1"><span class="path1"></span><span class="path2"></span></i>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                        1k
                    </span>
                </div>
            </a>
        </div>
        <div class="d-flex flex-row-fluid" style="padding-right: 10px">
            <a href="#" class="card hover-elevate-up shadow-sm parent-hover mb-4">
                <div class="card-body  " style="">
                    <i class="ki-duotone ki-rocket fs-1"><span class="path1"></span><span class="path2"></span></i>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                        1k
                    </span>
                </div>
            </a>
        </div> --}}

        <a href="#" data-bs-toggle="modal" data-bs-target="#create"
            class="card hover-elevate-up shadow-sm parent-hover mb-4" style="margin-right: 15px; ">
            <div class="card-body flex-row-fluid text-center" style="padding:12px 12px 0px 12px">
                <img src="{{ asset('/') }}assets/media/stock/food/img-11.jpg"
                    class="rounded-3 mb-1 w-75px h-60px w-xxl-50px h-xxl-50px" alt="" />

                <div class="text-center">
                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary ">Sweety</span>
                    <span class="text-gray-400 fw-semibold d-block " style="font-size: 9px">16 Pcs</span>
                </div>
            </div>
        </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#create"
            class="card hover-elevate-up shadow-sm parent-hover mb-4" style="margin-right: 15px; ">
            <div class="card-body flex-row-fluid text-center" style="padding:12px 12px 0px 12px">
                <img src="{{ asset('/') }}assets/media/stock/food/img-11.jpg"
                    class="rounded-3 mb-1 w-75px h-60px w-xxl-50px h-xxl-50px" alt="" />

                <div class="text-center">
                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary ">Sweety</span>
                    <span class="text-gray-400 fw-semibold d-block " style="font-size: 9px">16 Pcs</span>
                </div>
            </div>
        </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#create"
            class="card hover-elevate-up shadow-sm parent-hover mb-4" style="margin-right: 15px; ">
            <div class="card-body flex-row-fluid text-center" style="padding:12px 12px 0px 12px">
                <img src="{{ asset('/') }}assets/media/stock/food/img-11.jpg"
                    class="rounded-3 mb-1 w-75px h-60px w-xxl-50px h-xxl-50px" alt="" />

                <div class="text-center">
                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary ">Sweety</span>
                    <span class="text-gray-400 fw-semibold d-block " style="font-size: 9px">16 Pcs</span>
                </div>
            </div>
        </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#create"
            class="card hover-elevate-up shadow-sm parent-hover mb-4" style="margin-right: 15px; ">
            <div class="card-body flex-row-fluid text-center" style="padding:12px 12px 0px 12px">
                <img src="{{ asset('/') }}assets/media/stock/food/img-11.jpg"
                    class="rounded-3 mb-1 w-75px h-60px w-xxl-50px h-xxl-50px" alt="" />

                <div class="text-center">
                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary ">Sweety</span>
                    <span class="text-gray-400 fw-semibold d-block " style="font-size: 9px">16 Pcs</span>
                </div>
            </div>
        </a>



    </div>

    <div class="modal fade" tabindex="-1" id="create">
        <form action="{{ url('produkKategori') }}" method="POST">
            @csrf

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-top: 5px; padding-bottom:5px; border-bottom:0px">
                        {{-- <h3 class="modal-title">Tambah</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close--> --}}
                    </div>

                    <div class="modal-body  text-center">

                        <img src="{{ asset('/') }}assets/media/stock/food/img-11.jpg"
                            class="rounded-3 mb-1 w-75px h-60px w-xxl-50px h-xxl-50px" alt="" />

                        <div class="text-center">
                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary ">Sweety</span>
                            <span class="text-gray-400 fw-semibold d-block " style="font-size: 9px">16 Pcs</span>
                        </div>
                    </div>
                    <div class="modal-footer"
                        style="padding-top: 5px; padding-bottom:5px; justify-content:space-between;  border-top:0px">
                        <button type="button" class="btn btn-light btn-sm hover-scale"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm hover-scale">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
