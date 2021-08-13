@extends('layout.admin')
@section('content')
<div class="col-md-12 col-sm-12 ">
<div class="col-md-12 col-sm-12 content-head">
   <div class="error-div">
      @if(session('success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
         <strong id="success">{{session('success')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
   </div>
   <div class="addbook-div float-right">
      <a href="{{route('books.create')}}" class="btn btn-dark">Add Book</a>
   </div>
</div>
<!-- book list -->
<div class="x_panel">
<div class="x_title">
   <h2>Button Example <small>Users</small></h2>
   <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">Settings 1</a> <a class="dropdown-item" href="#">Settings 2</a> </div>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
   </ul>
   <div class="clearfix"></div>
</div>
<div class="x_content">
<div class="row">
   <div class="col-sm-12">
      <div class="card-box table-responsive">
         <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  
                  <th>Book Tile</th>
                  <th>Asin</th>
                  <th>Sub Title</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach($books as $book)

               <tr>
                  <td><a href="{{route('books.show',$book->id)}}">{{$book->title}}</a></td>
                  <td><a href="{{route('books.show',$book->id)}}">{{$book->asin}}</a></td>
                  <td><a href="{{route('books.show',$book->id)}}">{{$string = Str::of($book->sub_title)->words(15, ' >>>')}}</a></td>
                  <td>{{$book->author}}</td>
                  <td>{{$book->cat_name}}</td>
                  <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-primary btn-block">Edit</a>
                  </td>
                  <td><button class="btn btn-danger btn-block">Delete</button></td>
               </tr>
               @endforeach
               
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection