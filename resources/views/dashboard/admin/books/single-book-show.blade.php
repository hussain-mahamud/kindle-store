@extends('layout.admin')
@section('content')
<div class="col-md-12 col-sm-12 " style="background-color: white;">
	<div class="col-md-12 col-sm-12 content-head" style="margin-top: 25px;">
		<div class="col-md-5 col-sm-5 img-div" style="padding: 5%;">
			<a href="{{asset('books/'.$book->file)}}" target="_black">
				<img src="{{asset('covers/'.$book->cover)}}" height="450" width="300">
				{{$book->file}}
			</a>

		</div>
		<div class="col-md-7 col-sm-7">
			<h1 class="text-center">{{$book->title}}</h1>
			<h6 class="text-center">{{$book->sub_title}}</h6>
			<a href="#" class="text-center">
				<p>By <i><b>{{$book->author}},</b> </i> <i><b>{{$book->co_author}} ||</b></i>
				Category: <b>{{$cat->cat_name}}</b></p>
			</a>
			
			<div class="description">
				<p>{!! $book->description !!}</p>
			</div>
		</div>
	</div>
</div>

@endsection