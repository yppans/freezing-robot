
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Duval Elects</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
        <li><a href="/articles"><i class="fa fa-folder-open"></i> Articles</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-paper-plane"></i> Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/forum') }}"><i class="fa fa-comments"></i> Discussion Board</a></li>
		  @if ( !Auth::guest() )
		@if (Auth::user()->role == "admin")
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-terminal"></i> Admin Functions <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/article/create') }}">Create Article</a></li>
                      <li><a href="{{ url('/article') }}">Manage Articles</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/usermanager') }}">Manage Users</a></li>
          </ul>
        </li>
		@endif
	  @endif
        					@if (Auth::guest())
        						<li><a href="{{ url('/auth/login') }}"><i class="fa fa-unlock"></i> Login</a></li>
        						<li><a href="{{ url('/auth/register') }}"><i class="fa fa-user-plus"></i> Register</a></li>
        					@else
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
        							<ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/profile') }}">View Profile</a></li>
                      <li><a href="{{ url('/profile/edit') }}">Edit Profile</a></li>
						            <li class="divider"></li>
        								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
        							</ul>
        						</li>
        					@endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

