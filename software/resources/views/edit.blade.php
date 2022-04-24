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



            <div class="content">
    <h1 style="text-align: center;margin: 23px;font-size:30px;font-weight:bold;">Edit Book</h1>

                    @if(Session::has('success'))
                        <div class="alert alert-success"style="font-size:15px;" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

    <div class="container">

        <form method="get" action="{{ route('book.update',$books->id )}}"enctype="multipart/form-data">
            {{-- actiom {{ url('offer/store') }}  --}}
            @csrf
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Book photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" >
                        @error('photo')
                        <small class="form-text text-danger">{{$message }}</small>
                        @enderror
                        </div> --}}
                        <div class="form-group">
                        <label for="exampleInputEmail1"style="font-size: 15px;">Book Name</label>
                        <input type="text" class="form-control"style="width: 100%;height: 31px;font-size: 15px;" name="name"value="{{ $books->name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('name')
                        <small class="form-text text-danger">{{$message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"style="font-size: 15px;">Book price</label>
                        <input type="text" class="form-control"style="width: 100%;height: 31px;font-size: 15px;" name="price" value="{{ $books->price }}" id="exampleInputPassword1">
                        @error('price')

                        <small class="form-text text-danger">{{ $message  }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"style="font-size: 15px;">Details</label>
                            <input type="text" class="form-control"style="width: 100%;height: 31px;font-size: 15px;" value="{{ $books->description }}" name="details" id="exampleInputPassword1">
                            @error('details')
                            <small class="form-text text-danger">{{$message  }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"style="font-size: 15px;">Author</label>
                            <input type="text" class="form-control"style="width: 100%;height: 31px;font-size: 15px;" value="{{ $books->author }}" name="author" id="author">
                            @error('author')
                            <small class="form-text text-danger">{{$message  }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1"style="font-size: 15px;">Categories</label>
                            {{-- <p>{{ $books->categry }}</p> --}}
                            <select class="form-select"  name="categories"style="width: 100%;height: 31px;font-size: 15px;" aria-label="multiple select example">
                                {{-- <option  name="category">Shoes Categories</option> --}}
                                <option  value="{{ $books->categories }}"></option>
                                @foreach ($categories as $category )
                                    <option  value="{{ $category->id }} ">{{ $category->name }}</option>
                                @endforeach

                              </select>
                            @error('category')
                            <small class="form-text text-danger">{{$message  }}</small>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1"style="font-size: 15px;">Stock</label>
                            <input type="text" class="form-control"style="width: 100%;height: 31px;font-size: 15px;" value="{{ $books->stock }}" name="stock" id="exampleInputPassword1">
                            @error('stock')
                            <small class="form-text text-danger">{{$message  }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"style="font-size:15px;width:100%; ">Update</button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
        @endsection

