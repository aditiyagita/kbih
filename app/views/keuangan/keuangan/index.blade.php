@extends('master')

@section('content')

<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	@include('keuangan.sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
                        Keuangan
                        <small>Laporan Pengeluaran</small>
                    </h3>
                    <ul class="breadcrumb">
                      <li>
                         <i class="icon-home"></i>
                         <a href="index.html">Home</a> 
                         <i class="icon-angle-right"></i>
                     </li>
                     <li>
                         <a href="#">Keuangan</a>
                         <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Laporan Keuangan</a>
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

                </div>
                <div class="portlet-body">
                    {{ Form::open(array('route' => 'keuangan.laporan.store', 'class' => 'form-horizontal')) }}
                    <table class="table table-striped" id="sample_3">
                        <body>
                            <tr>
                                <td class="hidden-phone" width="20%"><strong>Tahun</strong></td>
                                <td class="hidden-phone">
                                   <select class="large m-wrap" tabindex="1" name="tahun">
                                    <option SELECTED>-- Pilih Tahun --</option>
                                    @foreach($data['tahun'] as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td class="hidden-phone" width="20%"></td>
                                <td class="hidden-phone"></td>
                            </tr>
                        </body>
                    </table>
                    <div class="form-actions">
                      <input type="submit" value="Cetak" class="btn green"/>
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