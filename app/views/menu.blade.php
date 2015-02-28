<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- BEGIN LOGO -->
					<a class="brand" href="index.html">
						<img src="{{ URL::asset('assets/img/logo.png') }}" alt="logo" />
					</a>
					<!-- END LOGO -->
					<!-- BEGIN RESPONSIVE MENU TOGGLER -->
					<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
						<img src="{{ URL::asset('assets/img/menu-toggler.png') }}" alt="" />
					</a>          
					<!-- END RESPONSIVE MENU TOGGLER -->				
					<!-- BEGIN TOP NAVIGATION MENU -->					
					<ul class="nav pull-right">
						<!-- BEGIN INBOX DROPDOWN -->
						<li class="dropdown" id="header_inbox_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-envelope-alt"></i>
								<span class="badge">5</span>
							</a>
							<ul class="dropdown-menu extended inbox">
								<li>
									<p>You have 12 new messages</p>
								</li>
								<li>
									<a href="#">
										<span class="photo"><img src="{{ URL::asset('assets/img/avatar2.jpg') }}" alt="" /></span>
										<span class="subject">
											<span class="from">Lisa Wong</span>
											<span class="time">Just Now</span>
										</span>
										<span class="message">
											Vivamus sed auctor nibh congue nibh. auctor nibh
											auctor nibh...
										</span>  
									</a>
								</li>
								<li>
									<a href="#">
										<span class="photo"><img src="{{ URL::asset('assets/img/avatar3.jpg') }}" alt="" /></span>
										<span class="subject">
											<span class="from">Richard Doe</span>
											<span class="time">16 mins</span>
										</span>
										<span class="message">
											Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
											auctor nibh...
										</span>  
									</a>
								</li>
								<li>
									<a href="#">
										<span class="photo"><img src="{{ URL::asset('assets/img/avatar1.jpg') }}" alt="" /></span>
										<span class="subject">
											<span class="from">Bob Nilson</span>
											<span class="time">2 hrs</span>
										</span>
										<span class="message">
											Vivamus sed nibh auctor nibh congue nibh. auctor nibh
											auctor nibh...
										</span>  
									</a>
								</li>
								<li class="external">
									<a href="#">See all messages <i class="m-icon-swapright"></i></a>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img alt="" src="{{ URL::asset('assets/img/avatar1_small.jpg') }}" />
								<span class="username">Bob Nilson</span>
								<i class="icon-angle-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
								<li class="divider"></li>
								<li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->	
				</div>
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>