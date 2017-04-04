<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div></div> <div class="navbar-header">
      <a style='font-size:xx-large' href="#" class="navbar-brand">Project1</a>
  </div>
  <!--<ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul> -->
    @if(Auth::check())

     <form class="navbar-form navbar-left" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
    </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{URL::to('/create_post')}}"><span class="glyphicon glyphicon-plus-sign"></span>Create post</a></li>
        <li><a href="{{URL::to('/my_account')}}"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
        <li>
            <a href="{{URL::to('/logout')}}">
            <span>{{ucwords(Auth::user()->fname)}}</span>
            <span class="glyphicon glyphicon-log-in"></span> Sign out</a>
        </li>
      </ul>
    @endif

  </div>
</nav>

<!--

    @if(Auth::user())



    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{URL::to('/upload')}}">Create new article</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
        <li><a href="{{URL::to('/logout')}}">
        <span>{{ucwords(Auth::user()->fname)}}</span>
        <span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>
    </ul>
    @endif

  </div>
</nav>

-->