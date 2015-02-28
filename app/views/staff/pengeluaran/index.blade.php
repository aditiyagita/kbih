@extends('master')

@section('content')

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
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "{{ URL::asset('staff/keuangan/delete') }}/"+i;    
            $(location).attr('href',url);
        });  
        $('.edit').click(function(){
            var url = $(this).attr('href');
            $('#dialogEdit').modal('show');
            $('#dialogEdit').load(url);
            return false;
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
                        Pengeluaran
                        <small>Input Pengeluaran</small>
                        <a href="#myModal1" role="button" class="btn green big" data-toggle="modal" style="float:right"><i class="icon-plus-sign"></i> Add</a>
                    </h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Pengeluaran</a>
                            <i class="icon-angle-right"></i>
						</li>
                        <li>
                            <a href="#">Input Pengeluaran</a>
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
                <table class="table table-striped" id="sample_3">
                    <thead>
                        <tr>
                        	<th class="hidden-phone" width='5%'>No.</th>
                            <th class="hidden-phone" width='15%'>Tanggal</th>
                            <th class="hidden-phone" width='15%'>Unit</th>
                            <th class="hidden-phone" width='15%'>Harga Satuan</th>
                            <th class="hidden-phone" width='15%'>Volume</th>
                            <th class="hidden-phone" width='15%'>Total</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['pengeluaran'] as $pengeluaran)
                        <tr>
                        	<td>{{ $no }}</td>
                            <td class="hidden-phone">{{ date("d M Y", strtotime( $pengeluaran->tanggal ) ) }}</td>
                            <td class="hidden-phone">{{ $pengeluaran->unit }}</td>
                            <td class="hidden-phone">{{ $pengeluaran->harga_satuan }}</td>
                            <td class="hidden-phone">{{ $pengeluaran->volume }}</td>
                            <td class="hidden-phone">{{ $pengeluaran->harga_total }}</td>
                            <td class="hidden-phone">
                                <center>
                                   <a href="{{ URL::asset('staff/keuangan/'.$pengeluaran->idpengeluaran.'/edit') }}" class="btn mini yellow icn-only editData"><i class="icon-check icon-white"></i> Edit</a>
                                   <a href="javascript:hapusAction({{ $pengeluaran->idpengeluaran }})" class="btn mini black icn-only editData"><i class="icon-trash icon-white"></i> Hapus</a>
                                </center>
                            </td>
                        </tr>
                        <?php $no++; ?>
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
            {{ Form::open(array('route' => 'staff.keuangan.store', 'class' => 'form-horizontal')) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel1">Input Pengeluaran</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">Tanggal</label>
                    <div class="controls">
                        <input class="m-wrap large" type="date" name="tanggal" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Unit</label>
                    <div class="controls">
                        <input class="m-wrap large" type="text" name="unit" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Harga Satuan</label>
                    <div class="controls">
                        <input class="m-wrap large" type="number" name="harga_satuan" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Volume</label>
                    <div class="controls">
                        <input class="m-wrap large" type="number" name="volume" required>
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