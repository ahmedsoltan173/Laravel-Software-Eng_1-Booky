@extends('layouts.app')

@section('content')

<div class="alert alert-success" id="success" style="display: none;font-size:15px;position:sticky;top:2px;z-index:999;">
    Added To Cart successful
</div>



<div class="book-details-page-container">
    <div class="book-details-grid-2-col">
      <div class="details-left">
        <div class="details-img-box">
            @foreach($bookdetails as $bookd)
          <img src="{{ asset('images/books/'.$bookd->photo) }}" alt="book image" />
        </div>

        <div class="details-title-price-cart-container">
          <div class="details-title-box">
            <p>Title</p>
            <h4 class="title">{{$bookd->name}}</h4>
          </div>
          <div class="details-price-box">
            <p>Price</p>
            <h4 class="price">{{$bookd->price}} <span>EGP</span></h4>
          </div>
          <div class="details-cart-box">


            {{-- {{$bookd->id}} --}}
            @if (Auth::user())
                <a href="" class="  btn cart-btn deleteAJAX" book_id="{{$bookd->id}}">Add to cart</a>
            @endif
            @if (!Auth::user())
                <a class="btn cart-btn" href="{{ route('login') }}">Add to cart</a>
            @endif
        @endforeach


            {{-- <button class="cart-btn">Add to cart</button> --}}
          </div>
        </div>
      </div>
      <div class="details-right">
        <div class="details-author-box">
          <p>Author</p>
          <h4 class="author">{{$bookd->author}}</h4>
        </div>

        <div class="details-book-description-box">
          <p>Book description</p>
          <p class="description">
            {{$bookd->description}}
          </p>
        </div>
      </div>
    </div>
  </div>
















@endsection

@section('script')
<script>

    $(document).on('click','.deleteAJAX',function(e){
        e.preventDefault();

        // var formData=new FormData($('#offerform')[0]);
        var bookID=$(this).attr('book_id');

        $.ajax({
            type:'post',
            url:"{{ route('store.book') }}",
            data:{
                '_token':'{{csrf_token()}}',
                'id':bookID,
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
