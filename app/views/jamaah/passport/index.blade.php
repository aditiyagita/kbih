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
    });
</script>
<div class="page-container row-fluid" style="background:#fff; min-height:800px">
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<!-- <div class="page-content"> -->
	<div class="container">
		<!-- BEGIN PAGE HEADER-->
		@include('jamaah.header')
		<div class="row-fluid">
			<div class="span8">	

			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
               <div class="portlet">
                <div class="portlet-title">
                    <h3 class="page-title">
                        Penyelenggaraan Passport
                        <small></small>
                        <a href="{{ URL::asset('jamaah/passport/cetak') }}" class="btn green big" style="float:right"><i class="icon-print"></i> Cetak</a>
                    </h3>
                </div>
                <div class="portlet-body">
                    <h2>Pembuatan Passport</h2>
                    <table class="table table-striped" id="sample_3">
                        <thead>
                            <tr>
                                <th class="hidden-phone" width='5%'>No.</th>
                                <th class="hidden-phone" width='25%'>Tanggal Pembuatan</th>
                                <th class="hidden-phone" width='25%'>Waktu Pembuatan</th>
                                <th class="hidden-phone" width='25%'>Tempat Pembuatan</th>
                                <th class="hidden-phone"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data['passport'] as $passport)
                                @if($passport->uraian != 'Pengambilan Buku Passport')
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                                        <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                                        <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                                        <td class="hidden-phone">
                                                <center>
                                                    <a href="{{ URL::asset('jamaah/passport/cetak/'.$passport->iddetailpassport) }}" class="btn mini green icn-only editData"><i class="icon-print icon-white"></i> Cetak</a>
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
                    <h2>Pengambilan Buku Passport</h2>
                    <table class="table table-striped" id="sample_3">
                        <thead>
                            <tr>
                                <th class="hidden-phone" width='5%'>No.</th>
                                <th class="hidden-phone" width='25%'>Tanggal Pengambilan</th>
                                <th class="hidden-phone" width='25%'>Waktu Pengambilan</th>
                                <th class="hidden-phone" width='25%'>Tempat Pengambilan</th>
                                <th class="hidden-phone"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data['passport'] as $passport)
                                @if($passport->uraian == 'Pengambilan Buku Passport')
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                                        <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                                        <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                                        <td class="hidden-phone">
                                                <center>
                                                    <a href="{{ URL::asset('jamaah/passport/cetak/'.$passport->iddetailpassport) }}" class="btn mini green icn-only editData"><i class="icon-print icon-white"></i> Cetak</a>
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
        <div class="span4">
            @include('jamaah.sidebar')
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