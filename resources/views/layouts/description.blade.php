@include('layouts.nav')

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
                      <p>contact number:{{$description->phonenum}}</p>
                      <p>email:{{$description->email}}</p>
                      <a style='border-color:#ccc' href="" class="btn btn-secondary">Contact Seller</a>
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
                      <p>contact number:{{$description->phonenum}}</p>
                      <p>email:{{$description->email}}</p>
                      <a style='border-color:#ccc' href="" class="btn btn-secondary">Contact Seller</a>
                    </div>
                    <div class="col-md-3" style="margin-left:20px">
                      
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