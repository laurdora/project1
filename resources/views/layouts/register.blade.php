@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width:50%;margin:auto;' class="panel panel-default">
		<h2 style='margin-left:5%' >Register</h2>
		<hr>

		<form action="register_action" method="post">

			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class='row content'>
				<div style='margin-left:5%' class ='col-sm-5'>

				  	<div class="form-group">
				  	  <label for="fname">Full name:</label>
				  	  <input type="fname" class="form-control" name="fname" id="fname" placeholder="Firstname Lastname">
				  		@if($errors->has('fname'))<div  style='margin-top:5px'class="alert alert-danger"> <p>{{$errors->first('fname')}}</p> </div>@endif
				  	</div>
					<div class="form-group">
					    <label for="username">Account name:</label>
					    <input type="username" class="form-control" name="username" id="username" placeholder="user name">
						@if($errors->has('username'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('username')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="password">Password:</label>
					    <input type="password" class="form-control" name="password" id="password" placeholder="******">
						@if($errors->has('password'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('password')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="cpassword">Confirmed Password:</label>
					    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="******">
						@if($errors->has('cpassword'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('cpassword')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" name="email" id="email" placeholder="eg:abc@xyz.com">
					    @if($errors->has('email'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('email')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					  <label for="usertype">User type:</label>
					  <select class="form-control" name="usertype" id="usertype">
					    <option value=" " >User type</option>
					    <option>Buyer</option>
					    <option>Seller</option>
					  </select>
					   @if($errors->has('usertype'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('usertype')}}</p> </div>@endif
					</div>

				</div>
				
				<div style='margin-left:5%' class ='col-sm-5'>	

				  <div class="form-group">
				    <label for="company">Company name:</label>
				    <input type="company" class="form-control" name="company" id="company" placeholder="optional">
				  </div>

					<div class="form-group">
					    <label for="address">Address:</label>
					    <input type="address" class="form-control" name="address" id="address" placeholder="unit, stree, suburb">
					    @if($errors->has('address'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('address')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="state">State:</label>
					    <input type="state" class="form-control" name="state" id="state" placeholder="eg: victoria">
					    @if($errors->has('state'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('state')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="country">Country:</label>
					    <input type="country" class="form-control" name="country" id="country" placeholder="eg: Australia">
					    @if($errors->has('country'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('country')}}</p> </div>@endif
					</div>					

					<div class="form-group">
					    <label for="zip">Zip code:</label>
					    <input type="zip" class="form-control" name="zip" id="zip" placeholder="eg: 3000">
					    @if($errors->has('zip'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('zip')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="phonenum">phone number:</label>
					    <input type="phonenum" class="form-control" name="phonenum" id="phonenum" placeholder="1234567890">
					    @if($errors->has('phonenum'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('phonenum')}}</p> </div>@endif
					</div>					

				</div>

			</div>
			<hr>
			<div class="form-group">
			<label style='margin-left:5%' for="preference"> Item Preference:</label>
			</div>

			<div class='row content'>

				<div style='margin-left:5%' class ='col-sm-5'>
				
					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="meat">
  			  		Meat
  					</label>
					</div>

					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="milk">
  			  		Milk
  					</label>
  					</div>

  					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="fruit">
  			  		Fruit
  					</label>
  					</div>

  					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="vegetable">
  			  		Vegetable
  					</label>		
  					</div>

				</div>
				
				<div style='margin-left:5%' class ='col-sm-5'>

					<div class="form-group">
					<label>
    				<input type="checkbox" name="preference[]" value="cheese">
  			  		Cheese
  					</label>
  					</div>

  					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="wine">
  			  		Wine
  					</label>
  					</div>

  					<div class="form-group">
				    <label>
    				<input type="checkbox" name="preference[]" value="grain">
  			  		Grain
  					</label>
  					</div>

				</div>

			</div>
			

			<p style='text-align: right'>
			 	<a style='border-color:#ccc' href="{{URL::to('/')}}" class="btn btn-secondary">Cancle</a>
        	  	<button style='margin-right:10%' type='submit' href="#" class="btn btn-primary">Submit</button>
        	</p>

		</form>
		</div>
		</div>
		</div>



@include('layouts.footer')
</body>
</html>