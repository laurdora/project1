<!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>

                    <li class="active ripple">
                      <a class="tree-toggle nav-header" href="{{URL::to('admin/home')}}"><span class="fa-home fa"></span> Dashboard 
                        
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span> Table
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{URL::to('/admin/home/table_users')}}">Users</a></li>
                        <li><a href="{{URL::to('/admin/home/table_posts')}}">Posts</a></li>
                      </ul>
                    </li>
                    <li><a href="">Credits</a></li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->