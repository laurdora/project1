@include('layouts.nav')

<div class="container-fluid">
    <div class="row">

        @if(Session::has('create_post_success'))
        <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
            {{Session::get('create_post_success')}} 
        </div>
        @endif

        @include('layouts.sidebar')

        <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 25px">Product supply</div>
                <div class="panel-body">
                     @foreach ($sellerposts as $sellerpost)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                       <img src="*" width="200px" height="200px" style="margin-top:10px">
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4 ><b>{{$sellerpost->title}}</b></h4>
                       <p style="height: 100px; overflow:hidden;text-overflow:ellipsis">{{$sellerpost->description}}</p>

                       <a style='border-color:#ccc' href="{{URL::to('/description')}}" class="btn btn-secondary">view detail</a>
                       <a style='border-color:#ccc' href="{{URL::to('/userdetail')}}" class="btn btn-secondary"><span class="glyphicon glyphicon-user"></span>{{$sellerpost->username}}</a>   
                       </div>
                    </div>
                    @endforeach
                    {{$sellerposts->appends(['page_b'=>$buyerposts->currentPage()])->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 25px">Product demand</div>
                <div class="panel-body">
                        @foreach ($buyerposts as $buyerpost)
                    <div class="row" style="border-bottom:1px solid #ddd">
                       <div class="col-md-4" style="margin-bottom:10px">
                       <img src="*" width="200px" height="200px" style="margin-top:10px">
                       </div>
                       <div class="col-md-8" style="margin-bottom:10px">
                       <h4 ><b>{{$buyerpost->title}}</b></h4>
                       <p style="height: 100px;overflow:hidden;text-overflow:string">{{$buyerpost->description}}</p>

                       <a style='border-color:#ccc' href="{{URL::to('/description')}}" class="btn btn-secondary">view detail</a>
                       <a style='border-color:#ccc' href="{{URL::to('/userdetail')}}" class="btn btn-secondary"><span class="glyphicon glyphicon-user"></span>{{$buyerpost->username}}</a>   
                       </div>
                    </div>
                    @endforeach
                    {{$buyerposts->appends(['page_a'=>$sellerposts->currentPage()])->links()}}
                </div>
            </div>
            </div>
    </div>
</div>

@include('layouts.footer')