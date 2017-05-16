@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width:50%;margin:auto;' class="panel panel-default">
		<h2 style='margin-left:5%' >Account details</h2>
		<hr>
			 @if (Session::has('profile_updated'))
	        <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
	             {{Session::get('profile_updated')}}
	        </div>
	        @endif

	        @if (Session::has('success'))
	        <div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
	             {{Session::get('success')}}
	        </div>
	        @endif
	        
			<div class='row content'>
				<div style='margin-left:5%' class ='col-sm-5'>

				  	<div class="form-group">
				  	  <label for="fname">Full name:</label>
				  	  <input readonly type="fname" class="form-control" name="fname" id="fname" value="{{Auth::user()->fname}}" placeholder="Firstname Lastname">
				  		@if($errors->has('fname'))<div  style='margin-top:5px'class="alert alert-danger"> <p>{{$errors->first('fname')}}</p> </div>@endif
				  	</div>
					<div class="form-group">
					    <label for="id">User ID:</label>
					    <input readonly type="id" class="form-control" name="username" id="username" value="{{Auth::user()->username}}" placeholder="user id" value="">
						@if($errors->has('userId'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('userId')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="password">Password:</label>
					    <input readonly type="password" class="form-control" name="password" id="password" value="{{Auth::user()->password}}" placeholder="enter password">
						@if($errors->has('password'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('password')}}</p> </div>@endif
					</div>	


					<div class="form-group">
					    <label for="email">Email:</label>
					    <input readonly type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" placeholder="example@example.com">
					    @if($errors->has('email'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('email')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="phonenum">Contact number:</label>
					    <input readonly type="phonenum" class="form-control" name="phonenum" id="phonenum" value="{{Auth::user()->phonenum}}" placeholder="enter contact number">
					    @if($errors->has('phonenum'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('phonenum')}}</p> </div>@endif
					</div>	

				</div>
				
				<div style='margin-left:5%' class ='col-sm-5'>	

				  <div class="form-group">
				    <label for="company">Company name:</label>
				    <input readonly type="company" class="form-control" name="company" id="company" value="{{Auth::user()->company}}" placeholder="optional">
				  </div>

					<div class="form-group">
					    <label for="address">Address:</label>
					    <input readonly type="address" class="form-control" name="address" id="address" value="{{Auth::user()->address}}" placeholder="full address">
					    @if($errors->has('address'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('address')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="state">State:</label>
					    <input readonly type="state" class="form-control" name="state" id="state" value="{{Auth::user()->state}}" placeholder="enter state">
					    @if($errors->has('state'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('state')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="country">Country:</label>
					    <input readonly type="country" class="form-control" name="country" id="country" value="{{Auth::user()->country}}" placeholder="Country">
					    @if($errors->has('country'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('country')}}</p> </div>@endif
					</div>					

					<div class="form-group">
					    <label for="zip">Zip code:</label>
					    <input readonly type="zip" class="form-control" name="zip" id="zip" value="{{Auth::user()->zip}}" placeholder="zip code">
					    @if($errors->has('zip'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('zip')}}</p> </div>@endif
					</div>

										

				</div>

			</div>
			<hr>
			<p style='text-align: right;'>
			<div class="floating-box" style="display:inline-block;">
				<a style='border-color:#ccc; margin-right:15px' href="{{URL::to('/edit_profile')}}" class="btn btn-secondary">Edit Profile</a>
			</div>
			<div class="floating-box" style="display:inline-block;">
				<a style='border-color:#ccc; margin-right:15px' href="{{URL::to('/change_password')}}" class="btn btn-secondary">Change Password</a>
			</div>
			<div class="floating-box" style="display:inline-block;">
        	 	<form action="userdetail" method="get">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button style='border-color:#ccc;background-color:#ffffff' href="#" name="username" value="{{Auth::user()->username}}" class="btn btn-secondary"> View description history</button> 
                </form>
            </div>
            <div class="floating-box" style="display:inline-block;">
            	<form action="delete_user" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="_method" value="DELETE">
				<button style='margin-left:20px; margin-right:10%' href="#" class="btn btn-primary">Delete account</button>
				</form>
			</div>
        	</p>


		</div>
		</div>
		</div>



@include('layouts.footer')
</body>
</html>