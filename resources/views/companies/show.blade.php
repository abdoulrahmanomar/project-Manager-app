@extends('layouts.app')


@section('content')
@extends('partials.success')
@extends('partials.error')

      <div class="col-md-9 float-left">
      <div class="jumbotron">
     
          <h1 class="display-3">{{$company->name}}</h1>
          <p class="lead">{{ $company->description}}.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
       
      </div>

      
        <!-- Example row of columns -->
    <a href="{{route('projects.create',$company->id)}}" class="btn btn-primary float-right">+ Add Project</a>
          <div class="row">

          	  @foreach($company->projects as $pro)
          <div class="col-lg-4">
          	
            <h2>{{ $pro->name}}</h2>
            <p class="lead">{{ $pro->description}}.</p>
            <p><a class="btn btn-secondary" href="{{route('projects.show',$pro->id)}}" role="button">View Project details &raquo;</a></p>
          
          </div>
           @endforeach
         </div>

           
        <hr>
       </div>
       <aside class="col-md-3 blog-sidebar">
         <!-- <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
                 -->
            <div class="p-3">
            <h4 class="font-italic">Manage</h4>
            <ol class="list-unstyled">
              <li><a href="{{route('companies.edit',$company->id)}}" class="btn btn-primary">Edit</a></li>
              
               <li><a href="{{route('projects.create')}}" class="btn btn-primary">Add Project</a></li>
                <li><a href="{{route('companies.index')}}" class="btn btn-primary">list Companies</a></li>
              <li><a href="#" class="btn btn-secondary">Add New Member</a></li>
               <li><a href="{{route('companies.create')}}" class="btn btn-success">Create New Company</a></li>
               <br/>
               <form action="{{route('companies.destroy',$company->id)}}" method="post">
              	<input type="hidden" name="_method" value="delete">
              	<li><input type="submit" value="Delete" class="btn btn-danger"></li>
              	{{csrf_field()}}
              	
              </form>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Members</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#"></a></li>
            </ol>
          </div>

         
        </aside>
    

    <footer class="container">
      <p>&copy; Elzahraa 2017-2018</p>
    </footer>

@endsection