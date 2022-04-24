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


<div class="alert alert-success"style="font-size:15px;display:none;" id="success" style="display: none;display: none;font-size:15px;position:sticky;top:2px;z-index:999;">
    save successful
</div>
<div class="container-fluid">
{{-- table-dark --}}
<h1 class="page-header">EDIT &check; &nbsp;<span> YOUR BOOKS</span></h1>
<div href="{{ route("book.create") }}" class="main-btn-container">
<a href="{{ route("book.create") }}" class="main-btn-container">
    <button class="add-new-book-btn">
      <svg xmlns="http://www.w3.org/2000/svg"
        class="icon-plus"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
      Add new book
    </button>
  </a>
</div>
    <table class="table  table-striped" style="font-size:15px;">
        <thead style="background-color: #000;color: #fff;">

            <tr >
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: center;">
                    <form action="{{ url('adminsearch') }}" method="GET">
                        <div class="search-container">
                            <input
                        type="text"
                        class="search-field"
                        name="name"
                        placeholder="search about books or categories or stock ..."
                        />
                    <button type="submit" class="search-btn">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="search-icon"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        >
                        <path
                        stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                        </svg>
                    </button>
                </div>
                    </form>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </th>
                </tr>
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
                <div class="d-flex justify-content-center "style="font-size:15px;">
                     {!! $books->links() !!}
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
            url:"{{ route('book.delete') }}",
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
