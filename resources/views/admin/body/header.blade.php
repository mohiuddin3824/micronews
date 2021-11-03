<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			
			
			
		  </ul>
		  
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  		
		 
		  
	      <!-- User Account-->
          <li class="user user-menu">	
			<a href="{{route('user.profile')}}" class="waves-light rounded" >
				
				@if (Auth::user()->profile_photo)
					<img src="{{asset(Auth::User()->profile_photo)}}" alt="{{Auth::User()->name}}">
				@else
					<img src="{{asset('backend/images/avatar/avatar-6.png')}}" alt="{{Auth::User()->name}}">

				@endif
			</a>
			
          </li>	
		 
			
        </ul>
      </div>
    </nav>
  </header>