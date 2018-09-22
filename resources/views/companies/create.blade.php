@extends('layouts.app')


@section('content')


      <div class="col-md-9 float-left">
      <h1>Create New Company</h1>
      
        <!-- Example row of columns -->
    
          <div class="row">
          	 
          <div class="col-lg-12">
            <form method="post" action="{{route('companies.store')}}">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="name">Name:<span class="required">*</span></label>
                <input 
                type="text"
                 name="name" 
                 id="name" 
                 placeholder="Enter company name"
                 class="form-control"
                 
                 >
              </div>
               <div class="form-group">
                <label for="description">Description:</label>
                <textarea 
                type="text"
                 name="description" 
                 id="description" 
                 placeholder="Enter company Description"
                 class="form-control" 
                 ></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add Company">
              </div>
              

            </form>
              
          	
         
         </div>
           
        <hr>
     </div>
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
              
              <li><a href="{{route('companies.index')}}" class="btn btn-secondary"><-<-All Compnies</a></li>
              
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