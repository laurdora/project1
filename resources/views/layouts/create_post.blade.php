@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width:50%;margin:auto;' class="panel panel-default">
		<h2 style='margin-left:5%' >Create Post</h2>
		<hr>

		<form action="create_post" enctype="multipart/form-data" method="post">
			{{csrf_field()}}

			<div class='row content'>
				<div style='margin-left:5%' class ='col-sm-5'>

				  	<div class="form-group">
					  <label for="itemcategory">Item category:</label>
					  <select class="form-control" name="itemcategory" id="itemcategory">
					    <option value=" " >Please select</option>
					    <option>camera</option>
					    <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Sports</option>
                        <option>Health</option>
                        <option>Toy</option>
                        <option>Others</option>
					  </select>
					   @if($errors->has('itemcategory'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('itemcategory')}}</p> </div>@endif
					</div>

					
					<div class="form-group">
					<label for="price">Price:</label>
					<div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="price" class="form-control" name="price" id="price" placeholder="Amount">
					</div>
					 @if($errors->has('price'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('price')}}</p> </div>@endif
					</div>

					<div class="form-group">
					    <label for="Ptitle">Title:</label>
					    <input type="Ptitle" class="form-control" name="Ptitle" id="Ptitle" placeholder="Post Title">
						@if($errors->has('Ptitle'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('Ptitle')}}</p> </div>@endif
					</div>	

					<div class="form-group">
					    <label for="description">Description:</label>
					   <textarea class="form-control" name="description" cols="50" rows="10" placeholder="Please describe your item here..."></textarea>
						@if($errors->has('description'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('description')}}</p> </div>@endif
					</div>
					

					<div class="form-group">
					    <label for="image">Image:</label>
					    <input type="file" class="form-control" name="image" id="image">
					    @if($errors->has('image'))<div style='margin-top:5px' class="alert alert-danger"> <p>{{$errors->first('image')}}</p> </div>@endif
					</div>

				</div>

			</div>
			<hr>
			<p style='text-align: right'>
			 	<a style='border-color:#ccc' href="{{URL::to('home')}}" class="btn btn-secondary">Cancle</a>
        	  	<button style='margin-right:10%' type='submit' href="#" class="btn btn-primary">Submit</button>
        	</p>

		</form>
		</div>
		</div>
		</div>


@include('layouts.footer')
</body>
</html>