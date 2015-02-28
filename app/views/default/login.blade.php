@extends('master')

@section('content')
<style type="text/css">
 .block-div{
 	width: 100%;
 	padding: 3px;
 	background-color: #35aa47 !important;
 	color: #fff;
 }
</style>
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
				<h2>Log In</h2>
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
			<div class="span4">
				
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