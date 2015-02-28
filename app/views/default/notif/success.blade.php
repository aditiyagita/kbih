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
				<h2>Registrasi Berhasil</h2>
				<h4>Selamat, Anda Berhasil Melakukan Registrasi</h4>
				<p>Silahkan Cetak Formulir Pendaftaran</p>
				@if( $data['layanan'] == 'haji' )
				<a href="{{ URL::asset('cetak-haji/'.$data['user'].'/'.$data['transaksi']) }}" class="btn green big"><i class="icon-print"></i> Cetak Formulir</a>
				@else
				<a href="{{ URL::asset('cetak-umroh/'.$data['user'].'/'.$data['transaksi']) }}" class="btn green big"><i class="icon-print"></i> Cetak Formulir</a> 
				@endif 
			</div>
			<div class="span4">
				@if( $data['layanan'] == 'haji' )
					@include('default.layanan-haji')
				@else
					@include('default.layanan-umroh')
				@endif
			</div>

		</div>
	</div>
	<!-- END PAGE CONTAINER-->			
	<!-- </div> -->
	<!-- BEGIN PAGE -->	 	
</div>

@stop