@extends('layout.app')
@section('content')
    <div class="row" style="margin-bottom:20px">
        <div class="col-12">
            <a href="{{ url('supplier') }}" class="btn  btn-primary btn-sm hover-scale">
                <- </a>

        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-header card-header-costum">
            <h3 class="card-title">Produk Supplier {{ $supplier }} </h3>
            {{-- <div class="card-toolbar">
                <a href="{{ url('supplier/create') }}" class="btn btn-sm btn-primary  hover-scale">
                    Tambah
                </a>
            </div> --}}
        </div>
        <div class="card-body py-5">


            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover border rounded w-100 text-center" sty>
                            <thead>
                                <tr class="tb-head bg-primary text-light-primary">
                                    <th style="width:50px">No</th>


                                    <th>Produk</th>

                                    <th>Harga Beli</th>
                                    <th>Barcode</th>
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





                                            <td style="text-align: left">{{ $row->nama_produk }}</td>
                                            <td>{{ money($row->harga_beli) }}</td>
                                            <td>{{ $row->barcode }}</td>




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
