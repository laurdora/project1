@include('admin.layouts.header')

      <div class="container-fluid mimin-wrapper">
  
  @include('admin.layouts.leftmenu')

  		
<!-- start: content -->
<div id="content">

    <div class="panel">
      <div class="panel-body">
        <div class="col-md-6 col-sm-12">
            <h3 class="animated fadeInLeft">Table: 
            </h3>
        </div>
      </div>                    
    </div>

    <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Post ID</th>
                          <th>User name</th>
                          <th>User type</th>
                          <th>Item category</th>
                          <th>Price</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Operation</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                        <tr>
                          <td>{{$post->Post_id}}</td>
                          <td>{{$post->username}}</td>
                          <td>{{$post->usertype}}</td>
                          <td>{{$post->item_category}}</td>
                          <td>${{$post->price}}</td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->description}}</td>
                          <td>
                            <form action="admin_deletepost" method="POST" >
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="_method" value="DELETE">
                              <button href="#" name="Post_id" value="{{$post->Post_id}}" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                          
                        </tr>
                        @endforeach

                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
<!-- end: content -->

    
          
          
      </div>

@include('admin.layouts.mobile')

<!-- start: Javascript -->
<script src="../../asset/js/jquery.min.js"></script>
<script src="../../asset/js/jquery.ui.min.js"></script>
<script src="../../asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="../../asset/js/plugins/moment.min.js"></script>
<script src="../../asset/js/plugins/jquery.datatables.min.js"></script>
<script src="../../asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="../../asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="../../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>