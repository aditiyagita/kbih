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
                        Cek Kesehatan
                        <small></small>
                        <a href="{{ URL::asset('jamaah/cekkesehatan/print') }}" class="btn green big" style="float:right"><i class="icon-print"></i> Cetak</a>
                    </h3>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped" id="sample_3">
                        <thead>
                            <tr>
                                <th class="hidden-phone">No.</th>
                                <th class="hidden-phone">Jenis Pemeriksaan</th>
                                <th class="hidden-phone">Waktu Pemeriksaan</th>
                                <th class="hidden-phone">Tempat Pemeriksaan</th>
                                <th class="hidden-phone">Tanggal Pemeriksaan</th>
                                <th class="hidden-phone"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach( $data['cekkesehatan'] as $cekkesehatan )
                                <tr>
                                    <td class="hidden-phone">{{ $i }}</td>
                                    <td class="hidden-phone">{{ $cekkesehatan->jenis_pemeriksaan }}</td>
                                    <td class="hidden-phone">{{ $cekkesehatan->waktu_pemeriksaan_mulai }} - {{ $cekkesehatan->waktu_pemeriksaan_selesai }}</td>
                                    <td class="hidden-phone">{{ $cekkesehatan->tempat_pemeriksaan }}</td>
                                    <td class="hidden-phone">{{ date("d M Y", strtotime( $cekkesehatan->tanggal_pemeriksaan ) ) }}</td>
                                    <td class="hidden-phone">
                                        <center>
                                            <a href="{{ URL::asset('jamaah/cekkesehatan/cetak/'.$cekkesehatan->iddetailcekkesehatan) }}" class="btn mini green icn-only editData"><i class="icon-print icon-white"></i> Cetak</a>
                                        </center>
                                    </td>
                                </tr>
                            <?php $i++; ?>
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