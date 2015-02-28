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
            var url = "{{ URL::asset('keuangan/pembayaran-bimbingan/delete') }}/"+i;    
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
						Pembayaran Bimbingan
                    </h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Pembayaran Bimbingan</a>
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
                            <th class="hidden-phone" width='15%'>Nama Lengkap</th>
                            <th class="hidden-phone" width='15%'>No. SPPH</th>
                            <th class="hidden-phone" width='15%'>Layanan</th>
                            <th class="hidden-phone" width='15%'>Status</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['layanan'] as $layanan)
                        <tr>
                        	<td>{{ $no }}</td>
                            <td class="hidden-phone">{{ $layanan->jamaah->namalengkap }}</td>
                            <td class="hidden-phone">{{ $layanan->no_spph }}</td>
                            <td class="hidden-phone">
                                @foreach( $data['generic'] as $generic )
                                    @if( $generic->id == $layanan->layanan )
                                    {{ $generic->desc }}
                                    <?php break; ?>
                                    @endif
                                @endforeach
                            </td>
                            <td class="hidden-phone">
                                @foreach( $data['generic'] as $generic )
                                    @if( $generic->id == $layanan->status )
                                    {{ $generic->desc }}
                                    <?php break; ?>
                                    @endif
                                @endforeach
                            </td>
                            <td class="hidden-phone">
                                <center>
                                   <a href="{{ URL::asset('keuangan/pembayaran-bimbingan/cetak/'.$layanan->idtransaksi) }}" class="btn mini blue icn-only editData"><i class="icon-print icon-white"></i> Cetak</a>
                                   <a href="{{ URL::asset('keuangan/pembayaran-bimbingan/'.$layanan->idtransaksi) }}" class="btn mini green icn-only editData"><i class="icon-check icon-white"></i> Detail</a>
                                   <a href="javascript:hapusAction({{ $layanan->idtransaksi }})" class="btn mini black icn-only editData"><i class="icon-trash icon-white"></i> Delete</a>
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
        Apakah yakin untuk menghapus data cicilan jamaah?
        <input type="hidden" id="id" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn btn-red" id="okHapus">Ya</button>
    </div>
</div>

@stop