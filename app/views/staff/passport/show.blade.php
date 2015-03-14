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
                        @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                            Pengambilan Passport
                        @else
                            Pembuatan Passport
                        @endif
                        <small>
                            @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                Detail Pengambilan Passport
                            @else
                                Detail Pembuatan Passport
                            @endif
                        </small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Pembuatan Passport</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                    Detail Pengambilan Passport
                                @else
                                    Detail Pembuatan Passport
                                @endif
                            </a>
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
                            <h3 class="page-title">
                                @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                    Detail Pengambilan Passport
                                @else
                                    Detail Pembuatan Passport
                                @endif
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%">
                                            @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                                <strong>Tanggal Pengambilan</strong>
                                            @else
                                                <strong>Tanggal Pembuatan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone">{{ $data['passport']->tanggal_pembuatan }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone">
                                            @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                                <strong>Waktu Pengambilan</strong>
                                            @else
                                                <strong>Waktu Pembuatan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone">
                                            Dari:
                                            {{ $data['passport']->waktu_pembuatan_awal }}
                                            Sampai:
                                            {{ $data['passport']->waktu_pembuatan_akhir }}
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone">
                                            @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                                <strong>Tempat Pengambilan</strong>
                                            @else
                                                <strong>Tempat Pembuatan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone">
                                            {{ $data['passport']->tempat_pembuatan }}
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                </body>
                            </table>
                      </div>
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
                                    @foreach( $data['passport']->detailpassport as $detail )
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>{{ $detail->jamaah->no_ktp }}</strong></td>
                                        <td class="hidden-phone">{{ $detail->jamaah->namalengkap }}</td>
                                    </tr>
                                    @endforeach
                                </body>
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