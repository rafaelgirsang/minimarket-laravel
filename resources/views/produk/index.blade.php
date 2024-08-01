@extends('layout.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-toolbar">
                <a href="{{ url('produk/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    Input Data Produk
                </a>
            </div>
        </div>
        <div class="card-body py-5">

            <form method="get">
                <div class="d-flex d-flex-search mb-4">
                    <input type="text" class="form-control form-control-sm input-btn" name="search"
                        value="{{ request('search') }}" autofocus>
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
                                <a href="{{ url('produk') }}" type="reset"
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

                                    <th>Kategori</th>
                                    <th>Produk</th>
                                    <th>Barcode</th>

                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Jumlah Stok</th>

                                    {{-- <th></th> --}}
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


                                            <td>{{ $row->kategori->kategori }}</td>
                                            <td style="text-align: left">{{ $row->nama_produk }}</td>
                                            <td>{{ null_dash($row->barcode) }}</td>

                                            <td class="text-end">
                                                @php
                                                    $inventori = DB::table('produk_inventori')
                                                        ->where('produk_id', $row->id)
                                                        ->orderBy('updated_at', 'desc')
                                                        ->first();

                                                @endphp

                                                {{ money($inventori->harga_beli) }}
                                            </td>
                                            <td class="text-end">{{ money($row->harga_jual) }}</td>
                                            </td>
                                            <td>{{ $row->jumlah_stok }}</td>

                                            {{-- <td><a href="{{ url('produk/tambahStokById/' . crypt_make($row->id)) }}"
                                                    class="btn btn-success btn-sm">Tambah Stok</a></td> --}}


                                            <td>
                                                <a href="#" class="droppdown btn btn-sm btn-light btn-flex btn-center"
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
                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('produk/tambahStokById/' . crypt_make($row->id)) }}"class="menu-link px-3 update">
                                                            Tambah Stok</a>
                                                    </div>
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('produk/hargaBeli/' . crypt_make($row->id)) }}"class="menu-link px-3 update">Harga
                                                            Beli</a>
                                                    </div>


                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('inventori/' . crypt_make($row->id)) }}"class="menu-link px-3 update">History
                                                            Stok</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a
                                                            href="{{ url('produk/supplier/' . crypt_make($row->id)) }}"class="menu-link px-3 update">Supplier</a>
                                                    </div>

                                                    <div class="menu-item px-3">
                                                        <a href="#"class="menu-link px-3 " data-bs-toggle="modal"
                                                            data-bs-target="#kurangStok{{ $row->id }}">Kurang
                                                            Stok</a>
                                                    </div>
                                                    {{-- <form action="{{ url('produk/' . crypt_make($row->id)) }}"
                                                        method="post" id="form-delete-{{ $row->id }}">
                                                        <div class="menu-item px-3">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="destroy({{ $row->id }})"
                                                                class="menu-link px-3">Delete</a>
                                                        </div>
                                                    </form> --}}
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

    @foreach ($data as $row)
        <div class="modal fade" tabindex="-1" id="kurangStok{{ $row->id }}">
            <form action="{{ url('produk/prosesKurangStok') }}" method="POST">
                @csrf

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                            <h3 class="modal-title">Kurang Stok</h3>

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
                                    <label for="basic-url" class="form-label">Produk</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="nama_produk"
                                            value="{{ $row->nama_produk }}" required readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Kategori</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="kategori"
                                            value="{{ $row->kategori->kategori }}" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Tersedia</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="stok_tersedia"
                                            value="{{ $row->jumlah_stok }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Diambil</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="number" class="form-control" name="stok_diambil" placeholder="0"
                                            min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="basic-url" class="form-label">Keterangan</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <textarea type="keterangan" class="form-control" name="keterangan" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">



                        <div class="modal-footer"
                            style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                            <button type="button" class="btn btn-light btn-sm  hover-scale"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm  hover-scale">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach




@endsection

@push('scripts')
    <script>
        function selected(key, value) {
            if (key == value) {
                return 'selected';
            } else {
                return '';
            }
        }
        $('.update').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/produkKategori/` + id,
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#update').modal('show');


                    $('#id').val(data.id);
                    $('#kategori').val(data.kategori);
                    $('#thumbnail').val(data.thumbnail);

                    var isActive = '';
                    isActive += '<option value="">Pilih</option>';
                    isActive += '<option value="Y" ' + selected(data.is_active, 'Y') +
                        ' >Aktif</option>';
                    isActive += '<option value="N"  ' + selected(data.is_active, 'N') +
                        '>Tidak Aktif</option>';
                    $('#is_active').html(isActive);

                }
            });
        });
    </script>
@endpush
