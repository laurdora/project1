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
    @if(Auth::user())

    
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>


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
