@extends('master')

@section('content')


{{ HTML::style('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}

<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	@include('staff.sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
						Informasi
						<small>{{ $data['informasi']->judul }}</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Informasi</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">{{ $data['informasi']->judul }}</a></li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->				
			<div class="row-fluid">
				<div class="span12">
					{{ Form::model($data["informasi"], array('method' => 'PATCH', 'class' => 'form-vertical', 'route' => array('staff.informasi.update', $data["informasi"]->idarticle))) }}
                    <div class="control-group">
                        <label class="control-label">Judul</label>
                        <div class="controls">
                          <input type="text" placeholder="large" class="m-wrap span12" value="{{ $data['informasi']->judul }}" readonly>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Isi</label>
                      <div class="controls">
                         <textarea class="span12 wysihtml5 m-wrap" rows="6" name='isi'>{{ $data['informasi']->isi }}</textarea>
                     </div>
                     <div class="form-actions">
                      <button type="submit" class="btn blue">Submit</button>
                      <button type="button" class="btn">Cancel</button>
                  </div>
              </div>
              {{ Form::close() }}

          </div>
      </div>
      <!-- END PAGE CONTENT-->
  </div>
  <!-- END PAGE CONTAINER-->			
</div>
<!-- BEGIN PAGE -->	 	
</div>


{{ HTML::script('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
{{ HTML::script('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}

@stop