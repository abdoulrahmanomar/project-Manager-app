@section('content')
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
                      @foreach($project->comments as $comment)
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

@endsection