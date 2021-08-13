@extends('layout.admin')
@section('content')
<div class="col-md-12 col-sm-12 ">
   <div class="card">
   <div class="card-body">
        <h4 class="text-center">Edit Slider</h4>
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
         <form  action="{{route('sliders.update',$slider->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6 offset-3">
               <label for="slider" class="form-label">Slider*</label>
               <input type="file" class="form-control" id="slider" name="sl_name" >
            </div>

             <div class="col-md-6 offset-3">
               <label for="sl_status" class="form-label">Status*</label>
               <select id="sl_status" class="form-select form-control" name="sl_status" >
                @if($slider->sl_status==1)
                 <option value="{{$slider->sl_status}}">Publish</option>
                 <option value="0">Unpublish</option>
                 @else
                 <option value="{{$slider->sl_status}}">Unpublish</option>
                 <option value="1">Publish</option>
                @endif
                 
                 
               </select>
            </div>
            
            <div class="col-md-12" style="margin-top: 20px;">
               <button type="submit" class="btn btn-danger offset-5"  >Update Slider</button>
            </div>
         </form>
      </div>
      
</div>

@endsection
