@include('layouts.nav')

<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid">
    <div class="row">

@include('layouts.sidebar')
        
        <div class="col-md-6">
          <div class="panel panel-default">
          @if ($description->usertype == "Seller")
              <div class="panel-heading">Product description</div>
                <div class="panel-body">
                <h1>{{$description->title}}</h1>
                <hr>
                  <div class="row">
                    <div class="col-md-1" style="margin-left:20px">
                      <img src="storage/default-avatar.png" class="img-circle" style="width:125px; height:125px">
                    </div>
                    <div class="col-md-4" style="margin-left:10%">
                      <p>user name:{{$description->username}}</p>
                      <p>contact number:
                        @if (Session::has('verified'))
                          {{$description->phonenum}}
                        @else
                          ******
                        @endif
                      </p>

                      <p>email:
                        @if (Session::has('verified'))
                          {{$description->email}}
                        @else
                          ******
                        @endif
                      </p>

                     {{-- Trigger the modal with a button --}}
                       @if (Session::has('verified'))
                      <button style="display:none"; class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal"></button>
                      @else
                      <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Contact {{$description->usertype}}</button>
                      @endif

                        {{-- Modal --}}
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            {{-- Modal content --}}
                            <div class="modal-content">
                             <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                               <h4 class="modal-title">Security protection</h4>
                             </div>
                             <div class="modal-body">
                               <p>Please verify you are a human</p>
                               <form action="human_verfication" method="post">
                               {{ csrf_field()}}
                               <div class="g-recaptcha" data-sitekey="6Lc2RCAUAAAAAAr3sx1t_cSUeyMufoebNU6CvbZc"></div>
                             </div>
                             <div class="modal-footer">
                               <button class="btn btn-default" type="submit">Submit</button>
                               </div>
                             </form>
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <ul class="menu-items" style="list-style-type:none;font-size:15px;display:inline-flex;margin-bottom:0px;margin-top:20px">
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Created at:{{$description->created_at}}</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Updated at:{{$description->updated_at}}</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Item type:{{$description->item_category}}</li>                        
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p><img src="storage/{{$description->image}}" class="img-thumbnail" style="width: 30%; height: 30%px; margin-top:10px"></p>
                        <p style="padding:15px;">
                            <small>
                            {{$description->description}}
                            </small>
                        </p>
                    </div>
                </div>   
                  </div>
                </div>
                @else
                <div class="panel-heading">Product description</div>
                <div class="panel-body">
                <h1>{{$description->title}}</h1>
                <hr>
                  <div class="row">
                    <div class="col-md-1" style="margin-left:20px">
                      <img src="storage/default-avatar.png" class="img-circle" style="width:125px; height:125px">
                    </div>
                    <div class="col-md-4" style="margin-left:10%">
                      <p>user name:{{$description->username}}</p>
                      <p>contact number:
                        @if (Session::has('verified'))
                          {{$description->phonenum}}
                        @else
                          ******
                        @endif
                      </p>

                      <p>email:
                        @if (Session::has('verified'))
                          {{$description->email}}
                        @else
                          ******
                        @endif
                      </p>

                     {{-- Trigger the modal with a button --}}
                       @if (Session::has('verified'))
                      <button style="display:none"; class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal"></button>
                      @else
                      <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Contact {{$description->usertype}}</button>
                      @endif

                        {{-- Modal --}}
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            {{-- Modal content --}}
                            <div class="modal-content">
                             <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                               <h4 class="modal-title">Security protection</h4>
                             </div>
                             <div class="modal-body">
                               <p>Please verify you are a human</p>
                               <form action="human_verfication" method="post">
                               {{ csrf_field()}}
                               <div class="g-recaptcha" data-sitekey="6LfHph8UAAAAAAD-X8Nw9vWeW8CFG2fdj8xe-5Eg"></div>
                             </div>
                             <div class="modal-footer">
                               <button class="btn btn-default" type="submit">Submit</button>
                               </div>
                             </form>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <ul class="menu-items" style="list-style-type:none;font-size:15px;display:inline-flex;margin-bottom:0px;margin-top:20px">
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Created at:{{$description->created_at}}</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Updated at:{{$description->updated_at}}</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Item type:{{$description->item_category}}</li>                        
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            {{$description->description}}
                            </small>
                        </p>
                    </div>
                </div>   
                  </div>
                </div>
                @endif
          </div>
        </div>
    </div>
</div>

@include('layouts.footer')