@extends('master')

@section('content')
<div class="page-container row-fluid" style="background:#fff; min-height:800px">
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<!-- <div class="page-content"> -->
	<div class="container">
		<!-- BEGIN PAGE HEADER-->
		@include('default.header')
		<div class="row-fluid">
			<div class="span12">	

			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
						<div class="item active">
							<img src="{{ URL::asset('images/satu.jpg') }}" alt="First slide">
						</div>
						<div class="item">
							<img src="{{ URL::asset('images/dua.jpg') }}" alt="Second slide">
						</div>
						<div class="item">
							<img src="{{ URL::asset('images/tiga.jpg') }}" alt="Third slide">
						</div>
					</div>
					<!-- Carousel nav -->
					<a class="carousel-control left" href="#myCarousel" 
					data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" 
					data-slide="next">&rsaquo;</a>
					<!-- Controls buttons -->
				</div> 
			</div>
			<div class="span4">
				<div class="tabbable tabbable-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1_1" data-toggle="tab">Log In</a></li>
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