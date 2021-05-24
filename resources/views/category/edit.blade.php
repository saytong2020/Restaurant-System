@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
           
                
           
            <form action="{{route('category.update',[$category->id])}}" method="POST">@csrf
                @method('PUT')
                <div class="card">
                <div class="card-header">Update Categories</div>

                <div class="card-body">
                   <div class="form-group">
                       <label for="name">Name</label>
                       <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid
                        @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class=""></span>
                   </div>
                   <div class="form-group">
                        <button class="btn btn-outline-warning">Update</button>
                    </div>
                </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
