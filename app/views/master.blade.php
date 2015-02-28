<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>{{ $data['title'] }}</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />


	<link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/css/metro.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/css/style_responsive.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('assets/css/style_default.css') }}" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/gritter/css/jquery.gritter.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/uniform/css/uniform.default.css') }}" />

	{{ HTML::style('assets/chosen-bootstrap/chosen/chosen.css') }}
	{{ HTML::style('assets/jquery-tags-input/jquery.tagsinput.css') }}
	{{ HTML::style('assets/clockface/css/clockface.css') }}
	{{ HTML::style('assets/bootstrap-datepicker/css/datepicker.css') }}
	{{ HTML::style('assets/bootstrap-timepicker/compiled/timepicker.css') }}
	{{ HTML::style('assets/bootstrap-colorpicker/css/colorpicker.css') }}
	{{ HTML::style('assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css') }}
	{{ HTML::style('assets/data-tables/DT_bootstrap.css') }}
	{{ HTML::style('assets/bootstrap-daterangepicker/daterangepicker.css') }}

	{{ HTML::style('assets/uniform/css/uniform.default.css') }}

	{{ HTML::style('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
	{{ HTML::script('assets/js/jquery-1.8.3.min.js') }} 
   

        <style type="text/css">
            .modal-huge {
                width: 80%;
                margin-left: -40%;
            }
            #upperLeftCorner {
                display: block;
                position: absolute;
                overflow: visible;
                margin: 0 0 0 0;
                padding: 0;
                border: none;
                float: right;
            }
        </style>


	<link rel="shortcut icon" href="favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="fixed-top">
		<!-- BEGIN HEADER -->
		@if(Auth::check())

			@if( Auth::user()->idusertype == '1' )
				@include('staff.menu')
			@elseif( Auth::user()->idusertype == '2' )
				@include('jamaah.menu')
			@elseif( Auth::user()->idusertype == '3' )
				@include('ketua.menu')
			@elseif( Auth::user()->idusertype == '4' )
				@include('frontoffice.menu')
			@elseif( Auth::user()->idusertype == '5' )
				@include('kepalasekretariat.menu')
			@elseif( Auth::user()->idusertype == '6' )
				@include('keuangan.menu')
			@endif
		
		@else
		
		@include('default.menu')
		
		@endif
		<!-- END HEADER -->
		<!-- BEGIN CONTAINER -->
		@yield('content')
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="footer">
			2014 &copy; Al-Karimiyah. Jl. H. Maksum No. 23 RT 04/02 Kel. Sawangan Baru Kec. Sawangan Kota Depok 16511
			<div class="span pull-right">
				<span class="go-top"><i class="icon-angle-up"></i></span>
			</div>
		</div>
		<!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        {{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
        {{ HTML::script('assets/ckeditor/ckeditor.js') }}
        {{ HTML::script('assets/breakpoints/breakpoints.js') }}
        {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::script('assets/bootstrap/js/bootstrap-fileupload.js') }}
        {{ HTML::script('assets/js/jquery.blockui.js') }}
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        {{ HTML::script('assets/js/excanvas.js') }}
        {{ HTML::script('assets/js/respond.js') }}
    	<![endif]-->
        {{ HTML::script('assets/chosen-bootstrap/chosen/chosen.jquery.min.js') }}
        {{ HTML::script('assets/uniform/jquery.uniform.min.js') }}
        {{ HTML::script('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
        {{ HTML::script('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
        {{ HTML::script('assets/jquery-tags-input/jquery.tagsinput.min.js') }}
        {{ HTML::script('assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js') }}
        {{ HTML::script('assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
        {{ HTML::script('assets/clockface/js/clockface.js') }}
        {{ HTML::script('assets/bootstrap-daterangepicker/date.js') }}
        {{ HTML::script('assets/bootstrap-daterangepicker/daterangepicker.js') }}
        {{ HTML::script('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
        {{ HTML::script('assets/bootstrap-timepicker/js/bootstrap-timepicker.js') }}

        {{ HTML::script('assets/data-tables/jquery.dataTables.js') }}
        {{ HTML::script('assets/data-tables/DT_bootstrap.js') }}

	{{ HTML::script('assets/noty/jquery.noty.js') }}
	{{ HTML::script('assets/noty/layouts/topCenter.js') }}
	{{ HTML::script('assets/noty/themes/default.js') }}

	{{ HTML::script('assets/js/app.js') }}

	<script type="text/javascript" charset="utf-8">
	function generate(type) {
		var n = noty({
			text: type,
			type: type,
			dismissQueue: false,
			modal: true,
			layout: 'topCenter',
			theme: 'defaultTheme'
		});
		console.log(type + ' - ' + n.options.id);
		return n;
	}
	</script>	
	<script src="assets/js/app.js"></script>  
	<script>
	jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
	
	

@include('alert')

</body>
<!-- END BODY -->
</html>