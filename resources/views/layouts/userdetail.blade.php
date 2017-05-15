@include('layouts.nav')

<div class="container-fluid">
    <div class="row">

@include('layouts.sidebar')
        
        <div class="col-md-6">
          <div class="panel panel-default">
         
              <div class="panel-heading">User profile</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3" style="margin-left:20px">
                      <img src="storage/default-avatar.png" class="img-circle" style="width:180px; height:180px">
                    </div>
                    <div class="col-sm-5">
                           <ul class="list-group" style="font-size: 18px">
                              <li class="list-group-item"><i class="glyphicon glyphicon-user"></i> {{$user->username}}</li>
                              <li class="list-group-item"><i class="glyphicon glyphicon-briefcase"></i> {{$user->company}}</li>
                              <li class="list-group-item"><i class="glyphicon glyphicon-earphone"></i> {{$user->phonenum}}</li>
                              <li class="list-group-item"><i class="glyphicon glyphicon-envelope"></i> {{$user->email}}</li>
                           </ul>
                        </div>
                  </div>
                  <hr>
                    @if (Session::has('post_deleted'))
                    <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
                         {{Session::get('post_deleted')}} 
                    </div>
                    @endif
                    @if (Session::has('post_updated'))
                    <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
                         {{Session::get('post_updated')}} 
                    </div>
                    @endif
                     @foreach ($posts as $post)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                       @if($post->image == NULL)
                       <img src="storage/default-avatar.png" width="200px" height="200px" style="margin-top:10px">
                       @else
                       <img src="storage/{{$post->image}}" width="200px" height="200px" style="margin-top:10px">
                       @endif
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4 ><b>{{$post->title}}</b></h4>
                       <p style="height: 100px; overflow:hidden;text-overflow:ellipsis">{{$post->description}}</p>
                       <div class="floating-box" style="display:inline-block;">
                       <form action="view_description" method="get">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <button style='border-color:#ccc;background-color:#ffffff' href="#" name="Post_id" value="{{$post->Post_id}}" class="btn btn-secondary">view detail</button>
                       </form>
                       </div>
                       @if ($post->username == Auth::user()->username)
                       <div class="floating-box" style="display:inline-block;">
                       <form action="edit_post" method="get">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <button style='border-color:#ccc;background-color:#ffffff' href="#" name="Post_id" value="{{$post->Post_id}}" class="btn btn-secondary">Edit</button>                       
                       </form>
                       </div>
                       <div class="floating-box" style="display:inline-block;">
                       <form action="delete_post" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <input type="hidden" name="_method" value="DELETE">
                       <button href="#" name="Post_id" value="{{$post->Post_id}}" class="btn btn-danger">Delete</button>                       
                       </form>
                       </div>
                       @endif
                       </div>
                    </div>
                    @endforeach

                    {{ $posts->appends(['username'=>$user->username])->links() }}
                   
                    
                </div>   
                  </div>
                </div>
               
          </div>
        </div>
    </div>
</div>

@include('layouts.footer')