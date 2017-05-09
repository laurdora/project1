@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width: 30%;margin:auto' class="panel panel-default">
			<h2 style='margin-left:5%' >Log in</h2>
				<hr>
					@if(Session::has('success'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('success')}} 
						</div>
					@endif
					@if(Session::has('Auth_error'))
						<div style='margin-left:7%;text-align:center' class="alert alert-danger col-sm-10"> 
							{{Session::get('Auth_error')}} 
						</div>
					@endif
					@if(Session::has('deleted'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('deleted')}} 
						</div>
					@endif
					@if(Session::has('logout'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('logout')}} 
						</div>
					@endif
			<form action="login_check" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div style='margin:10%' >
					  	<div class="form-group">
					  	  <label for="email">Email:</label>
					  	  <input type="email" name="email" class="form-control" id="email">
					  	   @if($errors->has('email'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('email')}}</p> </div>@endif
					  	</div>
	
						<div class="form-group">
						    <label for="password">Password:</label>
						    <input type="password" name="password" class="form-control" id="password">
						     @if($errors->has('password'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('password')}}</p> </div>@endif
						</div>
					</div>
				 <hr>
  			<p style='text-align: center'>
        	  <a style='border-color:#ccc' href="{{URL::to('/register')}}" class="btn btn-secondary">Sign up</a>
        	  <button style='margin-left:20px' href="#" class="btn btn-primary">Log in</button>

        	</p>
			</form>
		</div>

	</div>

@include('layouts.login_intro')

@include('layouts.footer')
</body>
</html>