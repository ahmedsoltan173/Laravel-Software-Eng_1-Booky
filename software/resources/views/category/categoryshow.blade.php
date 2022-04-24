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



<div class="alert alert-success" id="success" style="display: none;">
    save successful
</div>
<div class="container">
    <h1 class="page-header">EDIT &check; &nbsp;<span> YOUR CATEGORIES</span></h1>
    <div class="main-btn-container">
<a href="{{ route("category.create") }}"class="main-btn-container">
        <button class="add-new-category-btn">
          <svg
            xmlns="http://www.w3.org/2000/svg"
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
          Add new category
        </button>
</a>
      </div>
    <table class="table  table-striped" style="font-size:18px;text-align:center;">
        <thead style="background-color: #000;color: #fff;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category name</th>
                <th scope="col">Opration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Categories as $cat)

                <tr class="offerRow{{ $cat->id}}">
                    <th scope="row">{{ $cat->id }}</th>
                    <td>{{ $cat->name }}</td>
                    <td><a href="{{ url('editcate/'.$cat->id) }}" class="btn btn-primary" style="font-size: 15px;"> Edit </a>
                    {{-- <a href="" class="btn btn-danger deleteAJAX" cat_id="{{ $cat->id }}"> Delete  </a> --}}
                </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>

    // $(document).on('click','.deleteAJAX',function(e){
    //     e.preventDefault();

    //     // var formData=new FormData($('#offerform')[0]);
    //     var bookID=$(this).attr('cat_id');

    //     $.ajax({
    //         type:'post',
    //         url:"{{ route('cat.delete') }}",
    //         data:{
    //             '_token':'{{csrf_token()}}',
    //             'id':bookID,
    //         },
    //         // processData:false,
    //         // contentType:false,
    //         // cache:false,
    //         success:function(data){
    //             if(data.status==true){
    //                 $('#success').show();
    //             }
    //             $('.offerRow'+data.id).remove();
    //             //200
    //         },error:function(reject){

    //         }
    //     });
    // });







</script>
@stop
