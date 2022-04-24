@extends('layouts.app')
@section('content')


    <div class="alert alert-success" id="success" style="display: none;font-size:15px;position:sticky;top:2px;z-index:999;">
       Number Of Books update successful
    </div>

@foreach ($number as $nu)
@endforeach

<div class="book-details-page-container">
    <div class="book-details-grid-2-col">
      <div class="details-left">
        <div class="details-img-box">
            {{-- @foreach($booketails as $book) --}}
          <img src="{{ asset('images/books/'.$book->photo) }}" alt="book image" />
        </div>

        <div class="details-title-price-cart-container">
          <div class="details-title-box">
            <p>Title</p>
            <h4 class="title">{{$book->name}}</h4>
          </div>
          <div class="details-price-box">
            <p>Price</p>
            <h4 class="price">{{$book->price}} <span>EGP</span></h4>
          </div>

          <div class="details-cart-box">
            <a href="{{ url('addtocard') }}" class="btn cart-btn"style="font-size:13px;margin-right:20%;">Back To Cart</a>

    </div>
        </div>
      </div>
      <div class="details-right">
      <div class="details-author-box">
          <p>Author</p>
          <h4 class="author">{{$book->author}}</h4>
        </div>

        <div class="details-book-description-box">
          <p>Book description</p>
          <p class="description">
            {{$book->description}}
          </p>
        </div>

        <div style="position: relative;
    bottom: 0%;
    left: 80%;
    /* border:1px solid red; */
    ">
        <form  method="POST" action="" id="offerformedit" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"style="font-size:17px;">Number Of Your Book</label>
            <input type="number" class="form-control"style="width:70px;font-size:15px;" value="{{ $nu->number }}" name="number" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <small class="form-text text-danger">{{$message }}</small>
        @enderror
        </div>
        {{-- {{ $nu->id }} --}}
        <button id="updateOffer" cart_id="{{ $nu->id }}"style="width:70px;font-size:13px;" class="btn btn-primary">Done</button>

        {{-- <div class="card-body"> --}}
            <a href="{{ url('deleteIncard/'.$nu->id)}}"style="font-size:13px;width:70px;" class="btn btn-danger">Delete</a>
        {{-- </div> --}}
        </form>
    </div>
</div>
</div>
</div>
















    @stop

@section('script')
    <script>

$(document).on('click','#updateOffer',function(e){
        e.preventDefault();

        // var formData=new FormData($('#offerform')[0]);
        var cartID=$(this).attr('cart_id');

        $.ajax({
            type:'post',
            url:"{{ route('no.cart.update') }}",
            data:{
                '_token':'{{csrf_token()}}',
                'id':cartID,
                'number':$("input[name='number']").val()
            },
            // processData:false,
            // contentType:false,
            // cache:false,
            success:function(data){
                if(data.status==true){
                    $('#success').show();
                }
                $('.offerRow'+data.id).remove();
                //200
            },error:function(reject){

            }
        });
    });




    </script>


@stop
