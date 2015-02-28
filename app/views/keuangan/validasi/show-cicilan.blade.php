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
						Pembayaran
						<small>Detail Pembayaran</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ URL::asset('/') }}">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Pembayaran</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Detail Pembayaran</a></li>
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
                            <h3 class="page-title">
                                Data Pembayaran
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone"><strong>Layanan</strong></td>
                                        <td class="hidden-phone">
                                             @foreach( $data['generic'] as $generic)
                                                @if( $data['cicilan']->transaksi->layanan == $generic->id )
                                                {{ $generic->desc }}
                                                <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"><strong>Tahun Keberangkatan</strong></td>
                                        <td class="hidden-phone">{{ $data['cicilan']->transaksi->tahun_keberangkatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Status Jamaah</strong></td>
                                        <td class="hidden-phone">
                                            @foreach( $data['generic'] as $generic )
                                                @if( $generic->id == $data['cicilan']->transaksi->status_jamaah )
                                                    {{ $generic->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"><strong>Paket</strong></td>
                                        <td class="hidden-phone">
                                            @foreach( $data['generic'] as $generic )
                                                @if( $generic->id == $data['cicilan']->transaksi->paket )
                                                    {{ $generic->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kamar</strong></td>
                                        <td class="hidden-phone">
                                            @foreach( $data['generic'] as $generic )
                                                @if( $generic->id == $data['cicilan']->transaksi->kamar )
                                                    {{ $generic->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"><strong>Total Biaya</strong></td>
                                        <td class="hidden-phone">{{ $data['cicilan']->transaksi->total_biaya }}</td>
                                    </tr>
                                </body>
                            </table>
                            <table class="table table-striped" id="sample_3">
                                <thead>
                                    <tr>
                                        <th>Kwitansi</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone"><img src="{{ URL::asset('images/kwitansi/'.$data['cicilan']->kwitansi) }}" width="100px"></td>
                                        <td class="hidden-phone">{{ $data['cicilan']->tanggal }}</td>
                                        <td class="hidden-phone">{{ $data['cicilan']->total }}</td>
                                    </tr>
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