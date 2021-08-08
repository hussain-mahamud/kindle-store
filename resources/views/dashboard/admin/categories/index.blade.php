@extends('layout.admin')
@section('content')
<div class="col-md-12 col-sm-12 ">
<div class="col-md-12 col-sm-12 content-head">
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
      <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Category</a>
   </div>
   
</div>
<!-- add cat modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
         </div>
         <div class="modal-body">
            <form action="{{route('categories.store')}}" class="form-horizontal form-label-left" method="POST" >
               @csrf
               <div class="form-group row ">
                  <label class="control-label col-md-3 col-sm-3 "> Category Name*</label>
                  <div class="col-md-9 col-sm-9 ">
                     <input type="text" class="form-control"  name="cat_name" value="{{old('cat_name')}}"> 
                  </div>
               </div>
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Status*</label>
                  <div class="col-md-9 col-sm-9 ">
                     <select class="form-control cat_status" name="cat_status">
                        <option value="1">Select ....</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                     </select>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button class="btn btn-dark ">Add Category</button>
               </div>
            </form>
         </div>
         
      </div>
   </div>
</div>
<!--end add cat modal -->

<!-- category list -->
<div class="x_panel">
<div class="x_title">
   <h2 class="text-center">Add Category</small></h2>
   <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
      
   </ul>
   <div class="clearfix"></div>
</div>
<div class="x_content">
<div class="row">
   <div class="col-sm-12">
      <div class="card-box table-responsive">
         <table id="datatable-buttons" class="table table-striped table-bordered datatable" style="width:100%">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Categoy Name</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
            @php
               $i=1;
            @endphp
            @foreach($results as $result)
               <tr>
               
                  <td>{{$i++}}</td>
                  <td>{{$result->cat_name}}</td>
                  @if($result->cat_status==1)
                  <td>Publish</td>
                  @else
                  <td>Unpublish</td>
                  @endif
                  <td>{{$result->created_at}}</td>
                  <td><a href="{{route('categories.edit',$result->id)}}" class="btn btn-primary">Edit</a></td>
                  <td><a href="{{route('categories.destroy',$result->id)}}" class="btn btn-danger" onclick="return confirm('Delete Category?')">Delete</a></td> 
               </tr>
            @endforeach

            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection