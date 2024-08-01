@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }} {{ $produk->nama_produk }}</h3>
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
                                    <th>Stok In</th>
                                    <th>Stok Out</th>
                                    <th>Total Stok</th>
                                    <th>Jenis</th>
                                    <th>Keterangan</th>




                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty(checkData($data)))
                                    @php
                                        $no = number($data);
                                    @endphp
                                    @foreach ($data as $row)
                                        @php
                                            $color = $row->type == 'MIN' ? 'red' : '';
                                        @endphp
                                        <tr>
                                            <td style="color:{{ $color }}">{{ $no++ }}</td>
                                            <td style="color:{{ $color }}">{{ formatTanggal($row->created_at) }}</td>
                                            <td style="color:{{ $color }}">{{ $row->stok_in }}</td>
                                            <td style="color:{{ $color }}">{{ $row->stok_out }}</td>
                                            <td style="color:{{ $color }}">{{ $row->total_stok }}</td>
                                            <td style="color:{{ $color }}">{{ $row->type }}</td>
                                            <td style="text-align: left; color:{{ $color }}">{{ $row->keterangan }}
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

            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm hover-scale">
                Back
            </a>

            {{-- <button type="submit" class="btn  btn-success btn-sm hover-scale">
                Save
            </button> --}}

        </div>
    </div>





@endsection
