@extends('master')

@section('content')


{{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
<?php $th = $data['select'] == 0 ? date('Y') : $data['select']; ?>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-pembayaran',
                type: 'column'
            },
            title: {
                text: 'Grafik Pembayaran Haji dan Umroh'
            },
            subtitle: {
                text: 'Tahun {{ $th }}'
            },
            xAxis: {
                categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rupiah Rp (dalam ribu)'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                    this.x +': Rp'+ this.y +'.000';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Haji',
                data: {{ json_encode($data['grafik-haji']) }}

            },  {
                name: 'Umroh',
                data: {{ json_encode($data['grafik-umroh']) }}

            }]
        });
});

});
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
                        Laporan
                        <small>Laporan Pembayaran</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Laporan</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Laporan Pembayaran</a></li>
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
                        <div class="btn-group" style="float:right">
                            <button class="btn green dropdown-toggle" data-toggle="dropdown">
                                @if( $data['select'] == 0 )
                                    - Select Year - 
                                @else
                                    Tahun {{ $data['select'] }}
                                @endif
                                <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach( $data['tahun'] as $tahun )
                                    <li><a href="{{ URL::asset('ketua/laporan/pembayaran/'.$tahun) }}">{{ $tahun }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                        <div class="portlet-body">
                            <div id="grafik-pembayaran" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>            
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
                                        <th class="hidden-phone" width='15%'>Jenis Layanan</th>
                                        <th class="hidden-phone" width='20%'>Nama Jamaah</th>
                                        <th class="hidden-phone" width='10%'>Status</th>
                                        <th class="hidden-phone" width='10%'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data['cicilan'] as $cicilan)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $cicilan->layanan == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone">{{ $cicilan->jamaah->namalengkap }}</td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $cicilan->status == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone">
                                            <center>
                                                <a href="{{ URL::asset('ketua/laporan/print/pembayaran/'.$cicilan->idtransaksi) }}" class="btn mini green icn-only editData"><i class="icon-print icon-white"></i> Cetak</a>
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

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>


@stop