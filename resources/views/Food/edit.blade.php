@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                @if (Session::has('message'))
                {{Session::get('message')}}

                @endif
            </div>
            <form action="{{route('food.update',[$food->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="card">
                    <div class="card-header">Update Food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$food->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$food->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Discription</label>
                            <textarea class="form-control" name="description"cols="30" rows="5">{{$food->description}}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            
                            <select class="form-control @error('price') is-invalid @enderror" name="category">
                                <option value="">Select Category</option>
                                
                                @foreach (App\Models\Category::all() as $category)
                                
                                <option value="{{$category->id}}"
                                    @if($category->id==$food->category_id)
                                    selected
                                        
                                    @endif
                                    >{{$category->name}}</option>
                                @endforeach
                                
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                
                            @enderror
                            
                        </div>
                        <div class="form-group ">
                            <label for="name">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$food->image}}"/>
                        
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            
                        @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update</button>
                            
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection