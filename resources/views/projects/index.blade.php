@extends('layouts.app')


@section('content')

	<div class="col-md-6 offset-md-3">
		<div class="card">
		  <div class="card-header list-group-item active">
		     Projects <a href="{{route('projects.create')}}" class="btn btn-primary float-right">+ Add New</a>
		  </div>
		  <div class="card-body">
		  	<ul class="list-group">
		   @foreach($project as $pro)
		    <li class="list-group-item"><a href="{{route('projects.show',$pro->id)}}"> {{ $pro->name}}</a></li>
		    @endforeach
		 
		</ul>
   
     </div>
   </div>
</div>


@endsection