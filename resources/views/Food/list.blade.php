@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($categories as $category)
                
            <h2 class="text-primary">{{$category->name}}</h2>
            <div class="jumbotron">

                <div class="row">
                    @foreach (App\Models\Food::where('category_id',$category->id)->get() as $food )
                        
                    <div class="col-md-3 text-center">
                        <img src="{{asset('images')}}\{{$food->image}}" class="rounded mx-auto d-block" alt="" width="220" height="200">
                        <p class="text-primary">{{$food->name}}
                            <br><span class="text-danger">$ {{$food->price}}</span>
                        </p>
                        <p>
                            <a href="">Veiw</a>
                        </p>

                    </div>
                    @endforeach
                </div>

            </div>
            @endforeach

           
        </div>
    </div>
</div>
@endsection
