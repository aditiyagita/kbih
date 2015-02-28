@extends('master')

@section('content')
<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	@include('sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<!-- <div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here will be a configuration form</p>
			</div>
		</div> -->
		<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">
					<!-- BEGIN STYLE CUSTOMIZER-->
					<div class="styler-panel hidden-phone">
						<i class="icon-cog"></i>
						<i class="icon-remove"></i>
						<span class="settings">
							<span class="text">Style:</span>
							<span class="colors">
								<span class="color-default" data-style="default"></span>
								<span class="color-blue" data-style="blue"></span>
								<span class="color-light" data-style="light"></span>		
							</span>
							<span class="layout">
								<label class="hidden-phone">
									<input type="checkbox" class="header" checked="" value="" />Fixed Header
								</label>							
							</span>
						</span>
					</div>
					<!-- END STYLE CUSTOMIZER--> 	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
						404 Page
						<small>404 page sample</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Extra</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">404 Page</a></li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->				
			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid page-404">
						<div class="span5 number">
							404
						</div>
						<div class="span7 details">
							<h3>Opps, You're lost.</h3>
							<p>
								We can not find the page you're looking for.<br />
								Is there a typo in the url? Or try the search bar below.
							</p>
							<form action="#" />
								<div class="input-append">                      
									<input class="m-wrap" size="16" type="text" placeholder="keyword..." />
									<button class="btn blue">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	<!-- END PAGE CONTAINER-->			
	</div>
	<!-- BEGIN PAGE -->	 	
</div>
@stop