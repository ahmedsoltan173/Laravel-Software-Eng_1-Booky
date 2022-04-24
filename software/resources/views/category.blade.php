
@extends('layouts.app')

@section('content')


<div class="alert alert-success" id="success" style="display: none;display: none;font-size:15px;position:sticky;top:2px;z-index:999;">
    Added To Cart successful
</div>
<div class="alert alert-success" id="failed" style="display: none;">
sorry</div>


<div class="container">
        <div class="row">












<h1 style="text-align:center;font-size:20px;">{{ $categories->name }}</h1>
            <section class="section-selling-cards">
                <div class="books-container">
                    @foreach ($books as $book)

                        <figure class="book">
                            <div class="book-img-box">
                            <img src="{{ asset('images/books/'.$book->photo) }}" alt="book" />
                            </div>
                            <div class="book-details">
                            <div class="book-title-box">
                                <p>TITLE</p>
                                <h2 style="/*color: #74a3cf;*/font-weight: bold;">{{ $book->name }}</h2>
                                <h2 href="{{ route('like.book')}}" class="title book-title-link" style="font-weight: normal;font-size:14px;">
                                    {{ $book->description }}
                                </h2>
                            </div>
                            <div class="book-author-box">
                                <p>AUTHOR</p>
                                <h4 class="author">
                                    {{ $book->author }}
                                </h4>
                            </div>
                            <div class="book-price-box">
                                <p>PRICE</p>
                                <h4 class="price">{{ $book->price }}<span>EGP</span></h4>
                            </div>
                            <div class="add-to-cart">
                                <div class="cart-and-info">
                                    <form  method="POST" action="{{ route('like.book')}}">
                                        @csrf
                                        <input type="hidden" value="{{ $book->id }}" name="bookid">
                                        @if (Auth::user())
                                            <a href="" class="cart-btn addcart" book_id="{{ $book->id }}"> add to cart </a>
                                        @endif
                                        @if (!Auth::user())
                                            <a class="cart-btn" href="{{ route('login') }}">add to cart</a>
                                        @endif
                                        <button type="submit"class="btn btn-outline-light" style="color:black;padding:0 0 0 10px;margin:0px;border:0px; font-size:15px;position:relative; bottom: -34px;
                                        right: -50%;" >More Details -></button>
                                    </form>
                                {{-- <button class="cart-btn">Add to cart</button> --}}
                                </div>
                            </div>
                            </div>
                        </figure>
                    @endforeach
                </div>
            </section>








@endsection
  @section('script')
  <script>
   $(document).on('click','.addcart',function(e){
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

                {{-- {
                    '_token':"{{@csrf_token()}}",
                    'user_id':$("input[name='user_id']").val(),
                    'bookid':$("input[name='bookid']").val(),
                }, --}}
