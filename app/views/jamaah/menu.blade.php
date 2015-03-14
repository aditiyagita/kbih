<script type="text/javascript">
$(document).ready(function() { 
	$('.notif').click(function(){
		var url = "{{ URL::asset('updatenotification') }}"; 
		$.ajax({
			type: "GET",
			url: url
		});
		$('.ceks').fadeOut("slow");
		$('.notif').click(false);
	});
});
</script>
<?php
$notif = new Notifikasi();
$notifikasi = $notif->getNotifikasi();
$total = count($notifikasi);
?>
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<div class="container-fluid">
			<!-- BEGIN LOGO -->
			<a class="brand" href="index.html">

			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="{{ URL::asset('assets/img/menu-toggler.png') }}" alt="" />
			</a>          
			<!-- END RESPONSIVE MENU TOGGLER -->				
			<!-- BEGIN TOP NAVIGATION MENU -->					
			<ul class="nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->	
				<li class="dropdown" id="header_notification_bar">
					<a href="#" class="dropdown-toggle notif" data-toggle="dropdown">
						<i class="icon-warning-sign"></i>
						@if($total > 0)
							<span class="badge ceks">{{ $total }}</span>
						@endif
					</a>
					<ul class="dropdown-menu extended notification">
						<li>
							<p>You have {{ $total }} notifications</p>
						</li>
						@foreach( $notifikasi as $n )
						<li>
							<a href="{{ URL::asset($n->url) }}">
								<span class="label label-success"><i class="icon-plus"></i></span>
								{{ $n->uraian }}
								<span class="time">Pada Tanggal {{ $n->tanggal }}</span>
							</a>
						</li>
						@endforeach
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						@if( Auth::user()->jamaah->foto == '' )
						<img alt="{{ Auth::user()->username }}" src="{{ URL::asset('assets/img/avatar1_small.jpg') }}" />
						@else
						<img alt="{{ Auth::user()->username }}" src="{{ URL::asset('images/user/'.Auth::user()->jamaah->foto) }}" width="29" height="29"/>
						@endif
						<span class="username">{{ Auth::user()->username }}</span>
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::asset('jamaah/my-profile') }}"><i class="icon-user"></i> My Profile</a></li>
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