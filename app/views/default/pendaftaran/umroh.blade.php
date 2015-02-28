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
				{{ Form::open(array('url' => 'do-register-umroh', 'files'=> 'true', 'class' => 'form-horizontal')) }}
				<h2>Formulir Pendaftaran Layanan Umroh</h2>
				<div class="row-fluid">
					<div class="span12">

						<h3 class="block-div">User Account</h3>
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<input class="m-wrap span12" type="email" name="email" placeholder="E-Mail" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Username</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="username" placeholder="Username" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
								<input class="m-wrap span12" type="password" name="password" placeholder="Password" required>
							</div>
						</div>

						<h3 class="block-div">User Profile</h3>
						<div class="control-group">
							<label class="control-label">No. KTP</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="no_ktp" placeholder="No. KTP" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Lengkap</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="nama" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Ayah Kandung</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="ayah" placeholder="Nama Ayah Kandung" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Tempat, Tanggal Lahir</label>
							<div class="controls">
								<input class="m-wrap span6" type="text" name="tempatlahir" placeholder="Tempat Lahir" required>
								<input class="m-wrap span6" type="date" name="tanggallahir" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Umur</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="umur" placeholder="Umur" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Jenis Kelamin</label>
							<div class="controls">
								<select class="span12 m-wrap" tabindex="1" name="jeniskelamin">
									<option SELECTED>-- Pilih Jenis Kelamin --</option>
									@foreach($data['jeniskelamin'] as $jeniskelamin)
									<option value="{{ $jeniskelamin->id }}">{{ $jeniskelamin->desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Pendidikan</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="pendidikan" placeholder="" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Pekerjaan</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="pekerjaan" placeholder="Pekerjaan" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Kewarganegaraan</label>
							<div class="controls">
								<select class="span12 m-wrap" tabindex="1" name="kewarganegaraan">
									<option SELECTED>-- Pilih Kewarganegaraan --</option>
									@foreach($data['kewarganegaraan'] as $kewarganegaraan)
									<option value="{{ $kewarganegaraan->id }}">{{ $kewarganegaraan->desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Alamat</label>
							<div class="controls">
								<textarea class="span12 m-wrap" rows="3" name="alamat"></textarea>
							</div>
						</div>	
						<div class="control-group">
							<label class="control-label">Desa/Kelurahan</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="kelurahan" placeholder="Desa/Kelurahan" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Kecamatan</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="kecamatan" placeholder="Kecamatan" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Kabupaten/Kota</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="kabupaten" placeholder="Kabupaten/Kota" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Propinsi</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="propinsi" placeholder="Propinsi" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Kode Pos</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="kodepos" placeholder="Kode Pos" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">No. Telp</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="notelp" placeholder="No. Telp" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Golongan Darah</label>
							<div class="controls">
								<select class="span12 m-wrap" tabindex="1" name="golongan-darah">
									<option SELECTED>-- Pilih Golongan Darah --</option>
									@foreach( $data['gol_darah'] as $gol )
									<option value="{{$gol->id}}">{{$gol->desc}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<h3 class="block-div">Ciri-Ciri</h3>
						<div class="control-group">
							<label class="control-label">Rambut</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="rambut" placeholder="Rambut" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Alis</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="alis" placeholder="Alis" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Hidung</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="hidung" placeholder="Hidung" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Muka</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="muka" placeholder="Muka" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Tinggi</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="tinggi" placeholder="Tinggi" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Berat Badan</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="berat_badan" placeholder="Berat Badan" required>
							</div>
						</div>

						<h3 class="block-div">Pendaftaran Bimbingan Umroh</h3>
						<div class="control-group">
							<label class="control-label">Pergi Umrah</label>
								<div class="controls">
								<select class="span12 m-wrap" tabindex="1" name="pernah">
									<option SELECTED>-- Pilih Pergi Umrah --</option>
									@foreach($data['pergi_umrah'] as $umrah)
									<option value="{{ $umrah->id }}">{{ $umrah->desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Mahram/Pendamping</label>
							<div class="controls">
								<input class="m-wrap span12" type="text" name="pendamping" placeholder="Nama Mahram/Pendamping" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Hub. Mahram/Pendamping</label>
							<div class="controls">
								<select class="span12 m-wrap" tabindex="1" name="hub-pendamping">
									<option SELECTED>-- Pilih Hub. Mahram/Pendamping --</option>
									@foreach($data['hub_mahram'] as $hub)
									<option value="{{ $hub->id }}">{{ $hub->desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Tahun Keberangkatan</label>
							<div class="controls">
								<input class="m-wrap span12" type="number" name="tahun" placeholder="Tahun Keberangkatan" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Bulan Keberangkatan</label>
								<div class="controls">
									<select id="status-jamaah" class="span12 m-wrap" tabindex="1" name="bulan">
										<option SELECTED>-- Pilih Bulan Keberangkatan --</option>
										<?php
											$bulan = array(1,2,3,4,5,6,7,8,9,10,11,12);
										?>
										@foreach( $bulan as $b )
										<option value="{{$b}}">{{$b}}</option>
										@endforeach
									</select>
								</div>
						</div>
						<div class="control-group">
							<label class="control-label">Pilihan Paket Umrah</label>
							<div class="controls">
								<select id="paket" class="span12 m-wrap" tabindex="1" name="paket">
									<option SELECTED>-- Pilih Paket Umrah --</option>
									@foreach( $data['paket_umrah'] as $paket )
									<option value="{{$paket->id}}">{{$paket->desc}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Pilihan Kamar</label>
							<div class="controls">
								<select id="kamar" class="span12 m-wrap" tabindex="1" name="kamar">
									<option SELECTED>-- Pilih Kamar --</option>
									@foreach( $data['kamar'] as $kamar )
									<option value="{{$kamar->id}}">{{$kamar->desc}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<h3 class="block-div">User Photo</h3>
						<div class="control-group">
							<label class="control-label">Upload Foto</label>
							<div class="controls">
								<input type="file" name="imagefile" accept="image/gif, image/jpeg" id="i_file">
								<span class="label label-important">NOTE!</span>
								<span>Ukuran Foto Max 300 KB</span>
							</div>
						</div>
					</div>
				</div>
				<div style="float:right; margin: 10px 0;">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn green">Register</button>
				</div>
				{{ Form::close() }}
			</div>
			<div class="span4">
				@include('default.layanan-umroh')
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