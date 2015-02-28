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
				@include('jamaah.header')
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
				@include('jamaah.sidebar')
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