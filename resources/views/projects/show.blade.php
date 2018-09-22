@extends('layouts.app')


@section('content')


      <div class="col-md-9 float-left">
      <div class="card">
     
          <h1 class="display-3">{{$project->name}}</h1>
          <p class="lead">{{ $project->description}}.</p>
          
       
      </div>
    </div>

      
        <!-- Example row of columns -->
   
       <aside class="col-md-3 blog-sidebar">
         <!-- <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
                 -->
            <div class="p-3">
            <h4 class="font-italic">Manage</h4>
            <ol class="list-unstyled">
              <li><a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a></li>
              
               <li><a href="{{route('projects.create',$project->company_id)}}" class="btn btn-primary">Add Project</a></li>
                <li><a href="{{route('projects.index')}}" class="btn btn-primary">My projects</a></li>
              <li><a href="#" class="btn btn-secondary">Add New Member</a></li>
               <li><a href="{{route('projects.create')}}" class="btn btn-success">Create New Project</a></li>
               <br/>
               @if($project->user_id == Auth::user()->id)
               <form action="{{route('projects.destroy',$project->id)}}" method="post">
                {{csrf_field()}}
              	<input type="hidden" name="_method" value="delete">
              	<li><input type="submit" value="Delete" class="btn btn-danger"></li>
              	{{csrf_field()}}
              	
              </form>
              @endif
            </ol>
           <form id="add-user" action="{{route('projects.adduser')}}">
            <div class="input-group mb-3">
              <input type="hidden" name="project_id" value="{{$project->id}}" class="form-control">
              <input type="email" name="email" class="form-control" placeholder="Recipient's email" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm" type="submit" id="button-addon2">Add member</button>
            </div>
         
          </div>
         </form>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Members</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#"></a></li>
            </ol>
          </div>

         
        </aside>
        
          
             <div class="col-md-9  col-sm-6 col-xs-8 col-xs-offset-2">
        
            <!-- Fluid width widget -->        
          <div class="card panel-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                       Comments
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="media-list">
                      @foreach($comment as $comment)
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  
                                    <br>
                                    <strong>{{$comment->user->first_name}}</strong><br>
                                    <strong>{{$comment->user->last_name}}</strong><bt>
                                   <a href="users/{{$comment->user->id}}"> <strong>{{$comment->user->email}}</strong></a><br>
                                    <small>
                                        commented on <a href="#">{{$project->name}}</a>
                                    </small>
                                </h4>
                                <h5>{{$comment->body}}</h5>
                                <p>
                                    {{$comment->url}}
                                </p>
                            </div>
                        </li>
                      @endforeach
              </ul>
            </div>
          </div>
        </div>

       
         <hr/>
        
        <div class="col-md-9">
           <form class="form-control" method="post" action="{{route('comments.store')}}">
              {{ csrf_field() }}
               <input type="hidden" name="commentable_type" value="App\Project">
               <input type="hidden" name="commentable_id" value="{{ $project->id }}">
               <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea 
                type="text"
                 name="comment" 
                 id="comment" 
                 placeholder="Enter commment"
                 rows="3"
                 class="form-control" 
                 ></textarea>
              </div>
                  <div class="form-group">
                <label for="description">Proof of Work Done(url/photos):</label>
                <textarea 
                type="text"
                 name="url" 
                 id="description"
                 rows="2" 
                 placeholder="Enter url or screenShot "
                 class="form-control" 
                 ></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add comment">
              </div>
              

            </form>
        </div>
   
    

    <footer class="container">
      <p>&copy; Elzahraa 2017-2018</p>
    </footer>

@endsection