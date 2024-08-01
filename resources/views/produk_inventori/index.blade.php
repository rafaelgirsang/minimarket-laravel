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


                                    <th>Harga Beli</th>
                                    <th>Stok</th>
                                    <th>Supplier</th>


                                    <th>Update Terakhir</th>


                                    {{-- <th style="width:50px">#</th> --}}
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



                                            <td>{{ money($row->harga_beli) }}</td>
                                            <td>{{ $row->jumlah_stok }}</td>

                                            <td>
                                                @php
                                                    $history = DB::table('produk_supplier_history')

                                                        ->where('harga_beli', $row->harga_beli)
                                                        ->where('produk_id', $row->produk_id)
                                                        ->latest()
                                                        ->first();

                                                    $dataSupplier = DB::table('supplier')
                                                        ->where('id', $history->supplier_id)
                                                        ->latest()
                                                        ->first();
                                                    echo $dataSupplier->nama_supplier;

                                                @endphp

                                            </td>






                                            <td>{{ $row->updated_at }}</td>





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

    @foreach ($data as $row)
        <div class="modal fade" tabindex="-1" id="tambahStok{{ $row->id }}">
            <form action="{{ url('produkInventori/updateStokIn/' . $row->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-top: 5px; padding-bottom:5px">
                            <h3 class="modal-title">Tambah Stok</h3>

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
                                        <input type="text" class="form-control" name="produk"
                                            value="{{ $produk->nama_produk }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Kategori</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="kategori"
                                            value="{{ $kategori->kategori }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Tersedia</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="number" class="form-control" name="stok_tersedia"
                                            value="{{ $row->jumlah_stok }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Ditambah</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="number" class="form-control" name="stok_ditambah" required>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">



                        <div class="modal-footer"
                            style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                            <button type="button" class="btn btn-light btn-sm  hover-scale"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm  hover-scale">Tambah Stok</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach


    @foreach ($data as $row)
        <div class="modal fade" tabindex="-1" id="kurangStok{{ $row->id }}">
            <form action="{{ url('produkInventori/updateStokOut/' . $row->id) }}" method="POST">
                @csrf
                @method('PUT')
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
                                        <input type="text" class="form-control" name="produk"
                                            value="{{ $produk->nama_produk }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Kategori</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="text" class="form-control" name="kategori"
                                            value="{{ $kategori->kategori }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Tersedia</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="number" class="form-control" name="stok_tersedia"
                                            value="{{ $row->jumlah_stok }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="basic-url" class="form-label">Stok Dikurang</label>
                                    <div class="input-group input-group-sm  mb-5">
                                        <input type="number" class="form-control" name="stok_dikurang" required>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">



                        <div class="modal-footer"
                            style="padding-top: 5px; padding-bottom:5px; justify-content:space-between">
                            <button type="button" class="btn btn-light btn-sm  hover-scale"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm  hover-scale">Kurang Stok</button>
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
