@extends('master')

@section('content')
<div class="page-container row-fluid" style="background:#fff; min-height:800px">
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<!-- <div class="page-content"> -->
	<div class="container">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">	
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
				@include('default.header')
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<h2>{{ $data['informasi']->judul }}</h2>
				<hr/>
				{{ $data['informasi']->isi }}
			</div>
			<div class="span4">
				@if( $data['informasi']->idarticle == 4 OR $data['informasi']->idarticle == 6 OR $data['informasi']->idarticle == 7 )
					@include('default.layanan-haji')
				@elseif( $data['informasi']->idarticle == 5 OR $data['informasi']->idarticle == 8 OR $data['informasi']->idarticle == 9)
					@include('default.layanan-umroh')
				@else
					<div class="tabbable tabbable-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1_1" data-toggle="tab">Log In</a></li>
							<li><a href="{{ URL::asset('register') }}">Register</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<center>
									<img src="{{ URL::asset('images/logo.png') }}" width="100px">
								</center>
								<hr>
								{{ Form::open(array('url' => 'do', 'class' => 'form-vertical', 'id' => 'test')) }}
								<div class="control-group">
									<div class="controls">
										<div class="input-icon left">
											<i class="icon-user"></i>
											<input class="m-wrap span12" name="uname" type="text" placeholder="Username">    
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<div class="input-icon left">
											<i class="icon-envelope"></i>
											<input class="m-wrap span12" name="upw" type="password" placeholder="Password">    
										</div>
									</div>
								</div>
								<br>
								<button type="submit" class="btn green btn-block">Log In</button>
								{{ Form::close() }}
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTAINER-->			
<!-- </div> -->
<!-- BEGIN PAGE -->	 	
</div>

<script>
$('.carousel').carousel();
</script>
@stop