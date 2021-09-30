@extends('layout.admin')
@section('content')

<div class="col-md-12 col-sm-12 ">
	<div class="card">
	<div class="card-body">
        <h4 class="text-center">Add Book</h4>
  </div>
  <div class="error-div">
      @if(count($errors) > 0 )
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <ul class="p-0 m-0" style="list-style: none;" id="error">
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif
   </div>
	 <div class="card-body">
         <form  action="{{route('books.store')}}" enctype="multipart/form-data" method="POST" 		class="row g-3">
            @csrf
            <div class="col-md-6">
               <label for="name" class="form-label">Book Title*</label>
               <input type="text" class="form-control" id="name" name="title" required value="{{old('title')}}">
            </div>
            <div class="col-md-6">
               <label for="code" class="form-label">Book Sub Title*</label>
               <input type="text" class="form-control" id="code" name="sub_title" value="{{old('sub_title')}}" required>
            </div>
            <div class="col-md-4">
               <label for="keywords" class="form-label">Keywords</label>
               <input type="text" class="form-control" id="keywords" name="keywords" value="{{old('keywords')}}" >
            </div>
            <div class="col-md-3">
               <label for="author" class="form-label">Author Name*</label>
               <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}" required>
            </div>
            <div class="col-md-3">
               <label for="co_author" class="form-label">Co Author</label>
               <input type="text" class="form-control" id="co_author" name="co_author" value="{{old('co_author')}}" >
            </div>
            <div class="col-md-2">
               <label for="price" class="form-label">Price</label>
               <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" >
            </div>
            <div class="col-md-12">
               <label for="description" class="form-label ">Description*</label>
               <textarea class="description form-control" name="description" >{{old('description')}}</textarea>
            </div>
            
            <div class="col-md-6">
               <label for="cat_id" class="form-label">Category*</label>
               <select id="cat_id" class="form-select form-control" name="cat_id">
                @foreach($categories as $cat)
                 <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                @endforeach
               </select>
            </div>
             <div class="col-md-6">
               <label for="feature" class="form-label">Feature Book*</label>
               <select id="feature" class="form-select form-control" name="feature">
                 <option>Select....</option>
                 <option value="0">No</option>
                 <option value="1">Yes</option>
               </select>
            </div>
            <div class="col-md-12">
               <label for="cover" class="form-label">Cover Image</label>
               <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="col-md-12">
               <label for="pdf_file" class="form-label">Pdf File</label>
               <input type="file" class="form-control" id="pdf_file" name="file">
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
               <button type="submit" class="btn btn-danger offset-5"  >Upload Product</button>
            </div>
         </form>
      </div>
      
</div>
@endsection
