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
                        Cek Kesehatan
                        <small>Detail Cek Kesehatan</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Cek Kesehatan</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Detail Cek Kesehatan</a></li>
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
                                Detail Cek Kesehatan
                                <small>{{ $data['cekkesehatan']->jenis_pemeriksaan }}</small>
                            </h3>
                        </div>
                        <div class="portlet-body"><table class="table table-striped" id="sample_3">
                            <body>
                                <tr>
                                    <td class="hidden-phone" width="20%"><strong>Tanggal Pemeriksaan</strong></td>
                                    <td class="hidden-phone">{{ date("d M Y", strtotime( $data['cekkesehatan']->tanggal_pemeriksaan ) ) }}</td>
                                    <td class="hidden-phone" width="20%"></td>
                                    <td class="hidden-phone"></td>
                                </tr>
                                <tr>
                                    <td class="hidden-phone"><strong>Jenis Pemeriksaan</strong></td>
                                    <td class="hidden-phone">{{ $data['cekkesehatan']->jenis_pemeriksaan }}</td>
                                    <td class="hidden-phone"></td>
                                    <td class="hidden-phone"></td>
                                </tr>
                                <tr>
                                    <td class="hidden-phone"><strong>Waktu Pemeriksaan</strong></td>
                                    <td class="hidden-phone">
                                        Dari:
                                        {{ $data['cekkesehatan']->waktu_pemeriksaan_mulai }}
                                        Sampai:
                                        {{ $data['cekkesehatan']->waktu_pemeriksaan_selesai }}
                                    </td>
                                    <td class="hidden-phone"></td>
                                    <td class="hidden-phone"></td>
                                </tr>
                                <tr>
                                    <td class="hidden-phone"><strong>Tempat Pemeriksaan</strong></td>
                                    <td class="hidden-phone">
                                        {{ $data['cekkesehatan']->tempat_pemeriksaan }}
                                    </td>
                                    <td class="hidden-phone"></td>
                                    <td class="hidden-phone"></td>
                                </tr>
                            </body>
                        </table>
                    </div>

                    <div class="portlet">
                        <div class="portlet-title">
                            <h3 class="page-title">
                                Daftar Jamaah
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    @foreach( $data['cekkesehatan']->detilcekkesehatan as $detail )
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>{{ $detail->transaksi->jamaah->no_ktp }}</strong></td>
                                        <td class="hidden-phone">{{ $detail->transaksi->jamaah->namalengkap }}</td>
                                    </tr>
                                    @endforeach
                                </body>
                            </table>
                        </div>
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