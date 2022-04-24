

{{-- {{ Auth::user() }} --}}
@extends('layouts.app')

@section('content')
<ul class="nav justify-content-center" style="box-shadow: 10px 10px 10px #80808024;position: sticky;background: #f5f7f8;top: 0px;">
    <li style="position: absolute;left: 10px;top:10%;"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
      </svg></li>
    <li class="nav-item" style="padding-bottom:10px;">
      <a class="nav-link active" aria-current="page" href="{{route('Cat.Show')}}">Category </a>
    </li>
    <li class="nav-item" style="padding-bottom:10px;"    >
      <a class="nav-link" href="{{route('all')}}">Books</a>
    </li>

  </ul>



<div class="alert alert-success" id="success" style="display: none;font-size:15px;position:sticky;top:2px;z-index:999;">
Added To Cart successful
</div>
<div class="alert alert-success" id="failed" style="display: none;">
sorry</div>


<div class="container">
    <h1 style="text-align: center;
    font-weight: bold;
    color: #1766af6e;
    font-size: 3vw;">Result Of Search [ {{ $searched }} ] IS </h1>
    <div class="row">
        <table class="table  table-striped" style="font-size:15px;">
            <thead style="background-color: #000;color: #fff;">

                <tr>
                    <th scope="col" style=" padding-top: 18px;padding-bottom: 18px;">#</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">name</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">Price</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">details</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">Author</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">Photo</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">Stock</th>
                    <th scope="col"style=" padding-top: 18px;padding-bottom: 18px;">Opration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)

                    <tr class="offerRow{{ $book->id}}">
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->price }}</td>
                        <td ><p style="width:300px;height:100px;overflow:hidden;">{{ $book->description }}</p></td>
                        <td>{{ $book->author }}</td>
                        <td><img src="{{ asset('images/books/'.$book->photo) }}"width="100px"height="100px" alt=""></td>
                        <td>{{ $book->stock }}</td>
                        <td><a href="{{ url('edit/'.$book->id) }}" class="btn btn-primary"style="font-size:13px;"> Edit </a>
                        <a href="" class="btn btn-danger deleteAJAX" book_id="{{ $book->id }}"style="font-size:13px;"> Delete  </a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>






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
