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
			<div class="span8">	

			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<div class="portlet">
					<div class="portlet-title">
						<h3 class="page-title">
							{{ $data['informasi']->judul }}
							<small></small>
						</h3>
					</div>
					<div class="portlet-body">
						{{ $data['informasi']->isi }}
					</div>
				</div>
			</div>
			<div class="span4">
				@include('jamaah.info.haji.sidebar')
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