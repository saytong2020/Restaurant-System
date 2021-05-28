@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                    <img src="{{asset('images')}}/{{$food->image}}" alt="" class="rounded mx-auto d-block" width="100%">

              
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail') }}</div>

                <div class="card-body">
                    <p class="lead"> {{$food->name}}</p>
                    <p> {{$food->description}}</p>
                    <span class="text-danger">$ {{$food->price}}</span>
                    

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
