@include('layouts.nav')

<div class="container-fluid">
    <div class="row">

        @if(Session::has('create_post_success'))
        <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
            {{Session::get('create_post_success')}} 
        </div>
        @endif

        @include('layouts.sidebar')
        @if ( ! empty($interest_posts))
        <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 25px;text-shadow: 0px 0px 5px white)">Things you might be interested</div>
                <div class="panel-body">
                     @foreach ($interest_posts as $interest_post)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                      
                       <img src="storage/{{$interest_post->image}}" width="100%" height="170px" style="margin-top:10px">
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4><b>{{$interest_post->title}}</b></h4>
                       <p style="height: 100px; overflow:hidden;text-overflow:ellipsis">{{$interest_post->description}}</p>
                       <div class="row">
                          <div class="floating-box" style="display:inline-block;">
                            <form action="userdetail" method="get" value="{{$interest_post->Post_id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="username" value="{{$interest_post->username}}" class="btn btn-secondary"> <span class="glyphicon glyphicon-user"></span>{{$interest_post->username}}</button> 
                            </form> 
                          </div>
                          <div class="floating-box" style="display: inline-block;">
                            <form action="view_description" method="get" style="width:50px" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="Post_id" value="{{$interest_post->Post_id}}" class="btn btn-secondary"> view detail</button>
                            </form>
                          </div>
                        </div> 
                       </div>
                    </div>
                    @endforeach
                  {{$interest_posts->appends(['page_c'=>$buyerposts->currentPage()])->appends(['page_b'=>$sellerposts->currentPage()])->links()}}
                </div>
            </div>
        </div>
        @else
        @endif
        <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 25px;text-shadow: 0px 0px 5px white)">Product supply</div>
                <div class="panel-body">
                     @foreach ($sellerposts as $sellerpost)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                      
                       <img src="storage/{{$sellerpost->image}}" width="100%" height="170px" style="margin-top:10px">
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4><b>{{$sellerpost->title}}</b></h4>
                       <p style="height: 100px; overflow:hidden;text-overflow:ellipsis">{{$sellerpost->description}}</p>
                       <div class="row">
                          <div class="floating-box" style="display:inline-block;">
                            <form action="userdetail" method="get" value="{{$sellerpost->Post_id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="username" value="{{$sellerpost->username}}" class="btn btn-secondary"> <span class="glyphicon glyphicon-user"></span>{{$sellerpost->username}}</button> 
                            </form> 
                          </div>
                          <div class="floating-box" style="display: inline-block;">
                            <form action="view_description" method="get" style="width:50px" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="Post_id" value="{{$sellerpost->Post_id}}" class="btn btn-secondary"> view detail</button>
                            </form>
                          </div>
                        </div> 
                       </div>
                    </div>
                    @endforeach
                  @if (! empty($interest_posts))
                  {{$sellerposts->appends(['page_c'=>$buyerposts->currentPage()])->appends(['page_a'=>$interest_posts->currentPage()])->links()}}
                  @else
                  {{$sellerposts->appends(['page_c'=>$buyerposts->currentPage()])->links()}}
                  @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 25px">Product demand</div>
                <div class="panel-body">
                        @foreach ($buyerposts as $buyerpost)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                       <img src="storage/default-avatar.png" width="100%" height="170px" style="margin-top:10px">
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4><b>{{$buyerpost->title}}</b></h4>
                       <p style="height: 100px;overflow:hidden;text-overflow:string">{{$buyerpost->description}}</p>
                       <div class="row">
                          <div class="floating-box" style="display:inline-block;">
                            <form action="userdetail" method="get" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="username" value="{{$buyerpost->username}}" class="btn btn-secondary"> <span class="glyphicon glyphicon-user"></span>{{$buyerpost->username}}</button> 
                            </form> 
                          </div>
                          <div class="floating-box" style="display: inline-block;">
                            <form action="view_description" method="get" style="width:50px" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style='border-color:#ccc;background-color:#ffffff' href="#" name="Post_id" value="{{$buyerpost->Post_id}}" class="btn btn-secondary"> view detail</button>
                            </form>
                          </div>
                        </div> 
                       </div>
                    </div>
                    @endforeach
                    @if (! empty($interest_posts))
                    {{$buyerposts->appends(['page_b'=>$sellerposts->currentPage()])->appends(['page_a'=>$interest_posts->currentPage()])->links()}}
                    @else
                    {{$buyerposts->appends(['page_b'=>$sellerposts->currentPage()])->links()}}
                    @endif
                </div>
            </div>
            </div>
    </div>
</div>

@include('layouts.footer')