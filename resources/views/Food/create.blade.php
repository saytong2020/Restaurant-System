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
            <form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Add new Food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Discription</label>
                            <textarea class="form-control" name="description"cols="30" rows="5"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            
                            <select class="form-control @error('price') is-invalid @enderror" name="category">
                                <option value="">Select Category</option>
                                
                                @foreach (App\Models\Category::all() as $category)
                                
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"/>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            
                        @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Post</button>
                            
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection