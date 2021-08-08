@extends('layout.admin')
@section('content')
<div class="col-md-12 col-sm-12 ">
   <div class="card">
   <div class="card-body">
        <h4 class="text-center">Edit Book</h4>
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
         <form  action="{{route('categories.update',$cat->id)}}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <input type="hidden" name="" value="{{$cat->id}}">
            <div class="col-md-6 offset-3">
               <label for="author" class="form-label">Category Name*</label>
               <input type="text" class="form-control" id="author" name="cat_name" value="{{$cat->cat_name}}" required>
            </div>

             <div class="col-md-6 offset-3">
               <label for="cat_status" class="form-label">Category Status*</label>
               <select id="cat_status" class="form-select form-control" name="cat_status" >
                  @if($cat->cat_status==1)
                 <option value="{{$cat->cat_status}}">Publish</option>
                 <option value="0">Unpublish</option>
                 @else
                 <option value="{{$cat->cat_status}}">Unpublish</option>
                 <option value="1">Publish</option>
                 @endif
                 
                 
               </select>
            </div>
            
            <div class="col-md-12" style="margin-top: 20px;">
               <button type="submit" class="btn btn-danger offset-5"  >Update Category</button>
            </div>
         </form>
      </div>
      
</div>

@endsection
