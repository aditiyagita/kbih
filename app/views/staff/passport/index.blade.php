@extends('master')

@section('content')


{{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
<script type="text/javascript">
    
    $(document).ready(function() { 
        $('#sample_3').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "oLanguage": {
                "sLengthMenu": "_MENU_ per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': true,
                'aTargets': [0]
            }]
        });
        jQuery('#sample_3 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });
        $("#simpan-data").click(function() {  
            alert('sukses');  
        }); 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "{{ URL::asset('staff/passport/delete') }}/"+i;    
            $(location).attr('href',url);
        });  
    });

    function detailAction(data){
        alert(data);    
    } 
    function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
</script>

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
						Passport
						<small>Manage Passport</small>
                        <a href="#myModal1" role="button" class="btn green big" data-toggle="modal" style="float:right"><i class="icon-plus-sign"></i> Add</a>
                        <a href="#myModal2" role="button" class="btn green big" data-toggle="modal" style="float:right; margin-right:5px"><i class="icon-plus-sign"></i> Add Pengambilan Passport</a>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Passport</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Manage Passport</a></li>
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
                <h2>Data Pembuatan Passport</h2>
                <table class="table table-striped" id="sample_3">
                    <thead>
                        <tr>
                        	<th class="hidden-phone" width='5%'>No.</th>
                            <th class="hidden-phone" width='10%'>Tanggal Pembuatan</th>
                            <th class="hidden-phone" width='10%'>Waktu Pembuatan</th>
                            <th class="hidden-phone" width='10%'>Tempat Pembuatan</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['passport'] as $passport)
                            @if( $passport->uraian != 'Pengambilan Buku Passport' )
                                <tr>
                                	<td>{{ $no }}</td>
                                    <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                                    <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                                    <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                                    <td class="hidden-phone">
                                        <center>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport.'/addjamaah') }}" class="btn mini blue icn-only editData"><i class="icon-plus-sign icon-white"></i> Add Jamaah</a>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport) }}" class="btn mini yellow icn-only editData"><i class="icon-reorder icon-white"></i> Detail</a>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport.'/edit') }}" class="btn mini green icn-only editData"><i class="icon-check icon-white"></i> Edit</a>
                                            <a href="javascript:hapusAction({{ $passport->idpassport }})" class="btn mini black"><i class="icon-trash"></i> Delete</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="portlet-body">
                <h2>Data Pengambilan Passport</h2>
                <table class="table table-striped" id="sample_3">
                    <thead>
                        <tr>
                            <th class="hidden-phone" width='5%'>No.</th>
                            <th class="hidden-phone" width='10%'>Uraian</th>
                            <th class="hidden-phone" width='10%'>Tanggal Pengambilan</th>
                            <th class="hidden-phone" width='10%'>Waktu Pengambilan</th>
                            <th class="hidden-phone" width='10%'>Tempat Pengambilan</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['passport'] as $passport)
                            @if( $passport->uraian == 'Pengambilan Buku Passport' )
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td class="hidden-phone">{{ $passport->uraian }}</td>
                                    <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                                    <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                                    <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                                    <td class="hidden-phone">
                                        <center>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport.'/addjamaah') }}" class="btn mini blue icn-only editData"><i class="icon-plus-sign icon-white"></i> Add Jamaah</a>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport) }}" class="btn mini yellow icn-only editData"><i class="icon-reorder icon-white"></i> Detail</a>
                                            <a href="{{ URL::asset('staff/passport/'.$passport->idpassport.'/edit') }}" class="btn mini green icn-only editData"><i class="icon-check icon-white"></i> Edit</a>
                                            <a href="javascript:hapusAction({{ $passport->idpassport }})" class="btn mini black"><i class="icon-trash"></i> Delete</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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

<div id="dialogHapus" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Konfirmasi</h3>
    </div>
    <div class="modal-body">
        Apakah yakin untuk menghapus?
        <input type="hidden" id="id" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn btn-red" id="okHapus">Ya</button>
    </div>
</div>


<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            {{ Form::open(array('route' => 'staff.passport.store', 'class' => 'form-horizontal')) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel1">Input Passport</h3>
            </div>
            <div class="modal-body">
                        <input class="m-wrap large" type="hidden" name="uraian">
                </div>
                <div class="control-group">
                    <label class="control-label">Tanggal Pembuatan</label>
                    <div class="controls">
                        <input class="m-wrap large" type="date" name="tanggal_pembuatan" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Waktu Pembuatan</label>
                    <div class="controls">
                        <input class="m-wrap small inputs duration t1 time hrs" type="text" placeholder="jam:menit:detik" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" name="waktu_pembuatan_awal" required> 
                        -<input class="m-wrap small inputs duration t1 time hrs" type="text" placeholder="jam:menit:detik" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" name="waktu_pembuatan_akhir" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pembuatan</label>
                    <div class="controls">
                        <input class="m-wrap large" type="text" name="tempat_pembuatan" required>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn green">Save</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>

<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            {{ Form::open(array('route' => 'staff.passport.store', 'class' => 'form-horizontal')) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel1">Input Pengambilan Passport</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">Uraian</label>
                    <div class="controls">
                        <input class="m-wrap large" type="text" name="uraian" required value="Pengambilan Buku Passport" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tanggal Pengambilan</label>
                    <div class="controls">
                        <input class="m-wrap large" type="date" name="tanggal_pembuatan" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Waktu Pengambilan</label>
                    <div class="controls">
                        <input class="m-wrap small inputs duration t1 time hrs" type="text" placeholder="jam:menit:detik" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" name="waktu_pembuatan_awal" required> 
                        -<input class="m-wrap small inputs duration t1 time hrs" type="text" placeholder="jam:menit:detik" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" name="waktu_pembuatan_akhir" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pengambilan</label>
                    <div class="controls">
                        <input class="m-wrap large" type="text" name="tempat_pembuatan" required>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn green">Save</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>

@stop