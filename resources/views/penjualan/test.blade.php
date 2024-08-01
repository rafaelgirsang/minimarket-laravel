@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel 9 Add More Input Field Example | Laravelia</div>
                    <div class="card-body">
                        <form class="w-px-500 p-3 p-md-3" action="" method="post">
                            @csrf
                            <div class="row clone-row">
                                <div class="col-md-5 mb-4">
                                    <label class="form-label">Basic</label>
                                    <select class="form-control form-control-sm" name="Language[0]">
                                        <option value="AK">PHP</option>
                                        <option value="HI">Laravel</option>
                                        <option value="CA">Cake PHP</option>
                                        <option value="NV">Symphony</option>
                                        <option value="OR">YII</option>
                                        <option value="VA">Zend</option>
                                        <option value="WV">Phalcon</option>
                                    </select>
                                </div>
                                <div class="col-md-5 mb-4">
                                    <label class="form-label">Github Star</label>
                                    <input type="text" name="github_star[0]" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-1" style="margin-top:27px;">
                                    <span class="btn btn-danger btn-xs pull-right btn-del-select py-0">Remove</span>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-left: 5px;">
                                <span class="btn btn-secondary btn-xs add-select py-0">Add More</span>
                            </div>
                            <button type="submit" class="btn btn-success float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.btn-del-select').hide();
        $(document).on('click', '.add-select', function() {
            $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                "clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endpush
