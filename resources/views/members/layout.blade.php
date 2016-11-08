<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CRUD example</title>
    <link href="{{ url('/') }}/css/bootstrap.min.css" rel="stylesheet">    
    <link href="{{ url('/') }}/css/styles.css" rel="stylesheet">    
  </head>
  <body>
    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}/members">Simple CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="{{ Request::is('members') ? 'active' : ''}}"><a href="{{ url('/') }}/members">Members</a></li>
              <li class="{{ Request::is('members/create') ? 'active' : ''}}"><a href="{{ url('/') }}/members/create">Add</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="col-md-12">
      @if(Session::has('message'))
      <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif
        @yield('content')
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>