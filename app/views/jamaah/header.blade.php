<div class="masthead">
	        <img src="{{ URL::asset('images/header.png') }}" width="100%" style="padding: 20px 0 0 0">

	        <div class="navbar">
	          <div class="navbar-inner">
	            <div class="container">
	              <ul class="nav">
	                <li><a href="{{ URL::asset('/') }}">Home</a></li>
	                <li><a href="{{ URL::asset('jamaah/informasi/1') }}">Profil</a></li>
	                <li class="dropdown">
	                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                		Layanan
	                		<i class=" icon-caret-down"></i>
						</a>
	                	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						  <li><a tabindex="-1" href="{{ URL::asset('jamaah/haji') }}">Layanan Haji</a></li>
						  <li><a tabindex="-1" href="{{ URL::asset('jamaah/umroh') }}">Layanan Umroh</a></li>
						</ul>
	                </li>
	                <li><a href="{{ URL::asset('jamaah/konfirmasi') }}">Konfirmasi</a></li>
	                <li><a href="{{ URL::asset('jamaah/informasi/2') }}">Contact</a></li>
	                <li><a href="{{ URL::asset('jamaah/chat') }}">Chat</a></li>
	              </ul>
	            </div>
	          </div>
	        </div><!-- /.navbar -->
	     </div>