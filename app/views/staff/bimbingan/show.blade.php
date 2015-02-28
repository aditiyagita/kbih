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
                        Bimbingan
                        <small>Detail Bimbingan</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Bimbingan</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Detail Bimbingan</a></li>
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
                                Detail Bimbingan
                            </h3>
                        </div>
                        <div class="portlet-body"><table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Tanggal Bimbingan</strong></td>
                                        <td class="hidden-phone">{{ $data['bimbingan']->tanggal_bimbingan }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Waktu Bimbingan</strong></td>
                                        <td class="hidden-phone">{{ $data['bimbingan']->waktu_bimbingan_awal }} - {{ $data['bimbingan']->waktu_bimbingan_akhir }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Tempat Bimbingan</strong></td>
                                        <td class="hidden-phone">{{ $data['bimbingan']->tempat_bimbingan }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Nama Pembimbing</strong></td>
                                        <td class="hidden-phone">{{ $data['bimbingan']->nama_pembimbing }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
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