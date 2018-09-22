@extends('layouts.app')


@section('content')

	<div class="col-md-6 offset-md-3">
		<div class="card">
		  <div class="card-header list-group-item active">
		     Companies<a href="{{route('companies.create')}}" class="btn btn-success float-right">+ Add New Company</a>
		  </div>
		  <div class="card-body">
		  	<ul class="list-group">
		   @foreach($company as $comp)
		    <li class="list-group-item"><a href="{{route('companies.show',$comp->id)}}"> {{ $comp->name}}</a></li>
		    @endforeach
		 
		</ul>
   
     </div>
   </div>
</div>


@endsection