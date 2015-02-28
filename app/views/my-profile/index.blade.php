@extends('master')

@section('content')
<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	@if(Auth::check())

	@if( Auth::user()->idusertype == '1' )
	@include('staff.sidebar')
	@elseif( Auth::user()->idusertype == '2' )
	@include('jamaah.sidebar')
	@elseif( Auth::user()->idusertype == '3' )
	@include('ketua.sidebar')
	@elseif( Auth::user()->idusertype == '4' )
	@include('frontoffice.sidebar')
	@elseif( Auth::user()->idusertype == '5' )
	@include('kepalasekretariat.sidebar')
	@elseif( Auth::user()->idusertype == '6' )
	@include('keuangan.sidebar')
	@endif

	@endif
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
						My Profile
						<small>Edit Profile</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">My Profile</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Edit Profile</a> 
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->				
			<div class="row-fluid">
				<div class="span12">
					<div class="portlet">
						<div class="portlet-title">
							<h3>Update Profil</h3>
						</div>
						<div class="portlet-body">
							{{ Form::open(array('url' => 'update-profile', 'class' => 'form-horizontal')) }}
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Username</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ Auth::user()->username }}" name="username" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Email</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="email" value="{{ Auth::user()->email }}" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ Auth::user()->pegawai->namalengkap }}" name="namalengkap" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Alamat</strong></td>
                                        <td class="hidden-phone">
                                        	<textarea class="span12 m-wrap" name="alamat">{{ Auth::user()->pegawai->alamat }}</textarea>
                                        </td>
                                    </tr>
                                </body>
                            </table>
                            <div class="form-actions">
                              <input type="submit" value="Update" class="btn green"/>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                        {{ Form::close() }}
						</div>
						<div class="portlet-title">
							<h3>Update Password</h3>
						</div>
						<div class="portlet-body">
							{{ Form::open(array('url' => 'update-password', 'class' => 'form-horizontal')) }}
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Password</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="" name="password" required></td>
                                    </tr>
                                </body>
                            </table>
                            <div class="form-actions">
                              <input type="submit" value="Update" class="btn green"/>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                        {{ Form::close() }}
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