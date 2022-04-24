@extends('layouts.app')

@section('content')



<div class="container" style="min-height: 245px;
">
    <div class="row">
        {{-- {{$nu  }} --}}
        @foreach ($carts as $cart)
        <div class="card mb-3" style="max-width:50%;height:150px;max-height:151px;font-size: 15px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('images/books/'.$cart->photo) }}"style="max-height:149px;" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
          <div class="card-body">
              <h2 class="card-title"style="font-size:20px;color:red;">{{ $cart->name }}</h2>
              <p class="card-text"style="    overflow: hidden;

              height: 22px;">{{ $cart->description }}</p>
              <p class="card-text">Autor: <small class="text-muted">{{$cart->author }}</small></p>
              <p class="card-text">Price: <small class="text-muted">{{$cart->price }} LE</small></p>
              {{-- <a class="btn btn-danger" style="font-size: 15px;">Delete</a> --}}
              <a class=""style="font-size: 15px;font-weight:bold;" href="{{ url('editNoBook/'.$cart->pivot->book_id) }}">Edit</a>

        </div>

    </div>

</div>
</div>
@endforeach

    </div>
</div>

  @endsection
