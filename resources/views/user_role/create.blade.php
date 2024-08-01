@extends('layout.app')

@section('content')


<div class="card  shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Tambah Role</h3>
        <div class="card-toolbar">         
        </div>
    </div>
    <div class="card-body py-5">
        <form action="{{ url('userRole')}}" method="post">
            @csrf           
            <div class="row">
                <div class="col-md-12">
                    <label for="basic-url" class="form-label">Role</label>
                    <div class="input-group input-group-sm mb-5">                        
                        <input type="text" class="form-control" name="role"  required>
                    </div>
                </div>              
            </div>
            
            <div class="row " >
                <div class="col-6">
                    <a href="{{ URL::previous() }}" class="btn  btn-primary btn-sm">
                        Back
                    </a>
                </div>
                <div class="col-6 text-end">
                    <button type="submit" class="btn  btn-success btn-sm">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection