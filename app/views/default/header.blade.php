<div class="masthead">
	        <img src="{{ URL::asset('images/header.png') }}" width="100%" style="padding:20px 0 0 0">
	        <div class="navbar">
	          <div class="navbar-inner">
	            <div class="container">
	              <ul class="nav">
	                <li><a href="{{ URL::asset('/') }}">Home</a></li>
	                <li><a href="{{ URL::asset('informasi/1') }}">Profil</a></li>
	                <li class="dropdown">
	                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                		Layanan
	                		<i class=" icon-caret-down"></i>
						</a>
	                	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						  <li><a tabindex="-1" href="{{ URL::asset('informasi/7') }}">Layanan Haji</a></li>
						  <li><a tabindex="-1" href="{{ URL::asset('informasi/8') }}">Layanan Umroh</a></li>
						</ul>
	                </li>
	                <li><a href="{{ URL::asset('informasi/3') }}">Galeri</a></li>
	                <li><a href="{{ URL::asset('informasi/2') }}">Contact</a></li>
	              </ul>
	            </div>
	          </div>
	        </div><!-- /.navbar -->
	     </div>