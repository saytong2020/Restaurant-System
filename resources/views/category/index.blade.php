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
            <div class="card">
                <div class="card-header">All Categories
                    <span class="float-right">
                        <a href="{{route('category.create')}}">
                            <button class="btn btn-outline-secondary">Add Category</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edite</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories)>0)


                            @foreach ($categories as $key=>$category )

                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.edit',[$category->id])}}">
                                        <button class="btn btn-outline-primary">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal{{$category->id}}"> Delete </button>
                                </td>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('category.destroy',[$category->id])}}" method="POST">@csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Deleting Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="text-danger">
                                                <h4>Are you sure!  </h4>
                                                </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Canel</button>
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                            </tr>
                            @endforeach
                            @else
                            <td>No Category to Display</td>
                            @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection