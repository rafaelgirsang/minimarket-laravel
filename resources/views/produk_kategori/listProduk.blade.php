@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }} {{ $kategori->kategori }}</h3>
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



                                    <th>Produk</th>
                                    <th>Jumlah Stok</th>




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

                                            <td style="text-align: left">{{ $row->nama_produk }}</td>
                                            <td>{{ $row->jumlah_stok }}</td>

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
        <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">
            {{-- <div class="row">
                <div class="col-md-6"> <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm hover-scale">
                        Back
                    </a>
                </div>
                <div class="col-md-6"> <a href="" class="btn btn-primary btn-sm hover-scale">
                        Print
                    </a>
                </div>
            </div> --}}
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm hover-scale">
                Back
            </a>
            <a href="{{ url('produkKateori/listProdukPrint/' . segment(3)) }}" class="btn btn-success btn-sm hover-scale">
                Print
            </a>

        </div>



    </div>
    </div>





@endsection
