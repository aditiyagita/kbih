@extends('master')

@section('content')
<div class="page-container row-fluid" style="background:#fff; min-height:800px">
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<!-- <div class="page-content"> -->
	<div class="container">
		<!-- BEGIN PAGE HEADER-->
		@include('jamaah.header')
		<div class="row-fluid">
			<div class="span12">	

			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
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