@include('layouts.nav')

<div class="container-fluid">
    <div class="row">

@include('layouts.sidebar')
        
        <div class="col-md-8">
          <div class="panel panel-default">
              <div class="panel-heading">Product description</div>
                <div class="panel-body">
                <h1>Title</h1>
                <hr>
                  <div class="row">
                    <div class="col-md-1" style="margin-left:20px">
                      <img src="#" class="img-circle" style="width:125px; height:125px">
                    </div>
                    <div class="col-md-4" style="margin-left:5%">
                      <p>user name:</p>
                      <p>contact number:</p>
                      <p>email:</p>
                      <a style='border-color:#ccc' href="{{URL::to('/description')}}" class="btn btn-secondary">Contact buyer/seller</a>
                    </div>
                    <div class="col-md-3" style="margin-left:20px">
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <ul class="menu-items" style="list-style-type:none;font-size:15px;display:inline-flex;margin-bottom:0px;margin-top:20px">
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Created at:</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Updated at:</li>
                        <li style="margin-right:25px;font-weight:lighter;cursor:pointer">Item type:</li>                        
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p><img src="#" class="img-thumbnail" style="width: 100%; height: 300px; margin-top:10px"></p>
                        <p style="padding:15px;">
                            <small>
                            Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go. 

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.
                            Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go. 

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go. 

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go. 

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.
                            </small>
                        </p>
                    </div>
                </div>   
                  </div>
                </div>
          </div>
        </div>
    </div>
</div>

@include('layouts.footer')