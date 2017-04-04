@include('layouts.nav')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                @if(Session::has('create_post_success'))
                <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
                    {{Session::get('create_post_success')}} 
                </div>
                <br>
                @else
                Welcome to Project1
                @endif

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')