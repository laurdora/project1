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
				  	  <label for="fname">Full name: {{(Auth::user()->fname)}}</label>
				  		@if($errors->has('fname'))<div  style='margin-top:5px'class="alert alert-danger"> <p>{{$errors->first('fname')}}</p> </div>@endif
				  	</div>
					<div class="form-group">
					    <label for="id">User ID: {{(Auth::user()->username)}}</label>
						@if($errors->has('userId'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('userId')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="email">Email: {{(Auth::user()->email)}}</label>
					    @if($errors->has('email'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('email')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="phonenum">Phone number: {{(Auth::user()->phonenum)}}</label>
					    @if($errors->has('phonenum'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('phonenum')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="phonenum">User type: {{(Auth::user()->usertype)}}</label>
					    @if($errors->has('usertype'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('usertype')}}</p> </div>@endif
					</div>

				</div>
				
				<div style='margin-left:5%' class ='col-sm-5'>	

				  <div class="form-group">
				    <label for="company">Company name: {{(Auth::user()->company)}}</label>
				  </div>

					<div class="form-group">
					    <label for="address">Address: {{(Auth::user()->address)}}</label>
					    @if($errors->has('address'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('address')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="state">State: {{(Auth::user()->state)}}</label>
					    @if($errors->has('state'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('state')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="country">Country: {{(Auth::user()->country)}}</label>
					    @if($errors->has('country'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('country')}}</p> </div>@endif
					</div>					

					<div class="form-group">
					    <label for="zip">Zip code: {{(Auth::user()->zip)}}</label>
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
