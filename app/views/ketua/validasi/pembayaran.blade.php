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
            var url = "kelas/delete/"+i;    
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
	@include('ketua.sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
						Pembayaran
						<small>Validasi Pembayaran</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Pembayaran</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Manage Pembayaran</a></li>
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
                            <th class="hidden-phone" width='10%'>No. KTP</th>
                            <th class="hidden-phone" width='20%'>Nama Lengkap</th>
                            <th class="hidden-phone" width='15%'>Tanggal</th>
                            <th class="hidden-phone" width='10%'>Cicilan</th>
                            <th class="hidden-phone" width='20%'>Status</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['validasi'] as $validasi)
                            @if( $validasi->status == 36 )
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td class="hidden-phone">{{ $validasi->no_ktp }}</td>
                                    <td class="hidden-phone">{{ $validasi->jamaah->namalengkap }}</td>
                                    <td class="hidden-phone">{{ $validasi->tanggal }}</td>
                                    <td class="hidden-phone">{{ $validasi->total }}</td>
                                    <td class="hidden-phone">
                                        @foreach( $data['generic'] as $generic)
                                            @if( $validasi->status == $generic->id )
                                                {{ $generic->desc }}
                                                <?php break; ?>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="hidden-phone">
                                        <center>
                                            <a href="{{ URL::asset('ketua/validasi-pembayaran/'.$validasi->idpembayaran) }}" class="btn mini yellow icn-only editData"><i class="icon-check icon-white"></i> Detail</a>
                                            <a href="{{ URL::asset('ketua/validasi-pembayaran/valid/'.$validasi->idpembayaran.'/'.$validasi->idtransaksi) }}" class="btn mini green icn-only editData"><i class="icon-check icon-white"></i> Validasi</a>
                                            <a href="{{ URL::asset('ketua/validasi-pembayaran/reject/'.$validasi->idpembayaran.'/'.$validasi->idtransaksi) }}" class="btn mini black"><i class="icon-trash"></i> Reject</a>
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
@stop