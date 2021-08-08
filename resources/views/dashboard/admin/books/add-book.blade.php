@extends('layout.admin')
@section('content')

<div class="col-md-12 col-sm-12 ">
	<div class="card">
	<div class="card-body">
        <h4 class="text-center">Add Book</h4>
    </div>
	 <div class="card-body">
         <form  action="#" enctype="multipart/form-data" method="POST" 		class="row g-3">
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
            <div class="col-md-4">
               <label for="author" class="form-label">Author Name*</label>
               <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}" required>
            </div>
            <div class="col-md-4">
               <label for="co_author" class="form-label">Co Author</label>
               <input type="text" class="form-control" id="co_author" name="co_author" value="{{old('co_author')}}" >
            </div>
            <div class="col-md-12">
               <label for="description" class="form-label ">Description*</label>
               <textarea class="description form-control" name="description" value="{{old('description')}}"></textarea>
            </div>
            
            <div class="col-md-6">
               <label for="category" class="form-label">Category*</label>
               <select id="category" class="form-select form-control" name="category">
                 <option>Hi</option>
               </select>
            </div>
             <div class="col-md-6">
               <label for="feature" class="form-label">Feature Book*</label>
               <select id="feature" class="form-select form-control" name="feature">
                 <option>Select....</option>
                 <option value="No">No</option>
                 <option value="Yes">Yes</option>
               </select>
            </div>
            <div class="col-md-12">
               <label for="cover" class="form-label">Cover Image</label>
               <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="col-md-12">
               <label for="pdf_file" class="form-label">Pdf File</label>
               <input type="file" class="form-control" id="pdf_file" name="pdf_file">
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
               <button type="submit" class="btn btn-danger offset-5"  >Upload Product</button>
            </div>
         </form>
      </div>
      
</div>

@endsection
