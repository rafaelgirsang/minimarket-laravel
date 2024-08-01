@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
            </div>
        </div>
        <div class="card-body py-5">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="tahun"
                                id="tahun" required>
                                <option {{ request('tahun') == '' ? 'Selected' : '' }} value="">Pilih Tahun
                                </option>
                                @php
                                    $tahun = getYearAuto();
                                @endphp
                                @foreach ($tahun as $tahun)
                                    <option {{ request('tahun') == $tahun->tahun ? 'Selected' : '' }}
                                        value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                                @endforeach


                                {{-- <option {{ request('tahun') == '2025' ? 'Selected' : '' }} value="2025">2025</option>
                                <option {{ request('tahun') == '2026' ? 'Selected' : '' }} value="2026">2026</option> --}}
                            </select>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-sm  mb-5">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="bulan"
                                id="bulan" required>

                                <option {{ request('bulan') == '' ? 'Selected' : '' }} value="">Pilih Bulan </option>
                                <option {{ request('bulan') == '01' ? 'Selected' : '' }} value="01">Januari</option>
                                <option {{ request('bulan') == '02' ? 'Selected' : '' }} value="02">Februari</option>
                                <option {{ request('bulan') == '03' ? 'Selected' : '' }} value="03">Maret</option>
                                <option {{ request('bulan') == '04' ? 'Selected' : '' }} value="04">April</option>
                                <option {{ request('bulan') == '05' ? 'Selected' : '' }} value="05">Mei</option>
                                <option {{ request('bulan') == '06' ? 'Selected' : '' }} value="06">Juni</option>
                                <option {{ request('bulan') == '07' ? 'Selected' : '' }} value="07">Juli</option>
                                <option {{ request('bulan') == '08' ? 'Selected' : '' }} value="08">Agustus</option>
                                <option {{ request('bulan') == '09' ? 'Selected' : '' }} value="09">September</option>
                                <option {{ request('bulan') == '10' ? 'Selected' : '' }} value="10">Oktober</option>
                                <option {{ request('bulan') == '11' ? 'Selected' : '' }} value="11">November</option>
                                <option {{ request('bulan') == '12' ? 'Selected' : '' }} value="12">Desember</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm" type="submit">Cari</button> <a
                            class="btn btn-secondary btn-sm" href="{{ url('produk/produkTerlaris') }}"><i
                                class="bi bi-trash" style="color: gray"></i></a>
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
                                    <th>Produk</th>
                                    <th>Jumlah Transaksi</th>
                                    <th>Jumlah Item Terjual</th>
                                    <th>Jumlah Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (!empty(checkData($data))) --}}
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td style="text-align: left">{{ $row->nama_produk }}</td>
                                        <td>{{ null_dash(money($row->jumlah_transaksi)) }}</td>
                                        <td>{{ null_dash(money($row->jumlah_item_terjual)) }}</td>
                                        <td>{{ money($row->jumlah_stok) }}</td>


                                    </tr>
                                @endforeach
                                {{-- @else
                                    <tr>
                                        <td colspan="8">
                                            <span class="text-muted"><i>Empty data</i><span>
                                        </td>
                                    </tr>
                                @endif --}}




                            </tbody>
                        </table>

                    </div>
                </div>

            </div>




        </div>
        <div class="d-flex card-footer card-footer-form" style="justify-content: space-between">

            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm hover-scale">
                Back
            </a>
            @php

                if (!empty(request('tahum'))) {
                    $tahun = request('tahun');
                } else {
                    $tahun = date('Y');
                }
                if (!empty(request('bulan'))) {
                    $bulan = request('bulan');
                } else {
                    $bulan = date('m');
                }

            @endphp
            <a href="{{ url('produk/produkTerlarisPrint/' . $tahun . '-' . $bulan) }}"
                class="btn btn-success btn-sm hover-scale">
                Print
            </a>
        </div>
    </div>
@endsection
