<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- BEGIN LOGO -->
					<a class="brand" href="index.html">
						<img src="{{ URL::asset('images/AL-KARIMIYAH.png') }}" alt="logo" />
					</a>
					<!-- END LOGO -->
					<!-- BEGIN RESPONSIVE MENU TOGGLER -->
					<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
						<img src="{{ URL::asset('assets/img/menu-toggler.png') }}" alt="" />
					</a>          
					<!-- END RESPONSIVE MENU TOGGLER -->				
					<!-- BEGIN TOP NAVIGATION MENU -->					
					<ul class="nav pull-right">
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img alt="" src="{{ URL::asset('assets/img/avatar1_small.jpg') }}" />
								<span class="username">{{ Auth::user()->username }}</span>
								<i class="icon-angle-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ URL::asset('my-profile') }}"><i class="icon-user"></i> My Profile</a></li>
								<li class="divider"></li>
								<li><a href="{{ URL::asset('logout') }}"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->	
				</div>
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>