
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<div class="container">
  		<a class="navbar-brand" href="/">Software</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		   
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="/">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Portfolio</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Blog</a>
		      </li>
				</ul>
				<form class="form-inline my-2 my-lg-0 float-right mr-2" method="GET" action="/search">
						
						<input class="form-control mr-sm-2" type="search" placeholder="Enter your search..." name="content" aria-label="Search" style="height:35px">
					<button class="btn btn-primary btn-sm"><i class="fa fa-search" style="color:white; font-size:16px"></i></button>
					</form>
		    @guest
                 <div class="login">
			    	<a href="/login" class="nav-link btn btn-secondary mr-2">Login</a>
			    	<a href="/register" class="nav-link btn btn-success">Register</a>
		    	</div>
            @else
            <div class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       Hi! {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </div>
            @endguest
		 
  		</div>
	</nav>	<!--  End nav -->