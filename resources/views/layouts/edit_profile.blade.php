@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width:50%;margin:auto;' class="panel panel-default">
		<h2 style='margin-left:5%' >Edit Profile</h2>
		<hr>

		<form action="my_account_action" method="post">

			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class='row content'>
				<div style='margin-left:5%' class ='col-sm-5'>

				  	<div class="form-group">
				  	  <label for="fname">Full name:</label>
				  	  <input type="fname" class="form-control" name="fname" id="fname" placeholder="Firstname Lastname">
				  		@if($errors->has('fname'))<div  style='margin-top:5px'class="alert alert-danger"> <p>{{$errors->first('fname')}}</p> </div>@endif
				  	</div>

					<div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com">
					    @if($errors->has('email'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('email')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="phonenum">Contact number:</label>
					    <input type="phonenum" class="form-control" name="phonenum" id="phonenum" placeholder="enter contact number">
					    @if($errors->has('phonenum'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('phonenum')}}</p> </div>@endif
					</div>	

				<div class="form-group">
				    <label for="company">Company name:</label>
				    <input type="company" class="form-control" name="company" id="company" placeholder="optional">
				  </div>

				</div>
				
				<div style='margin-left:5%' class ='col-sm-5'>	


					<div class="form-group">
					    <label for="address">Address:</label>
					    <input type="address" class="form-control" name="address" id="address" placeholder="full address">
					    @if($errors->has('address'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('address')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="state">State:</label>
					    <input type="state" class="form-control" name="state" id="state" placeholder="enter state">
					    @if($errors->has('state'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('state')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="country">Country:</label>
					    <input type="country" class="form-control" name="country" id="country" placeholder="Country">
					    @if($errors->has('country'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('country')}}</p> </div>@endif
					</div>					

					<div class="form-group">
					    <label for="zip">Zip code:</label>
					    <input type="zip" class="form-control" name="zip" id="zip" placeholder="zip code">
					    @if($errors->has('zip'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('zip')}}</p> </div>@endif
					</div>

										

				</div>

			</div>
			<hr>
			<p style='text-align: right'>
			 	<a style='border-color:#ccc' href="{{URL::to('/my_account')}}" class="btn btn-secondary">Cancel</a>
        	  <button style='margin-left:20px' href="#" class="btn btn-primary">Apply change</button>
        	  	
        	</p>

		</form>
		</div>
		</div>
		</div>



@include('layouts.footer')
</body>
</html>