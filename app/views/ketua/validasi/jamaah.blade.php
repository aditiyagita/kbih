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
        $("#okValid").click(function() {  
            var i = $("#valid").val();
            var url = "{{ URL::asset('ketua/validasi-jamaah/valid') }}/"+i;    
            $(location).attr('href',url);
        });
        $("#okReject").click(function() {  
            var i = $("#reject").val();
            var url = "{{ URL::asset('ketua/validasi-jamaah/reject') }}/"+i;    
            $(location).attr('href',url);
        });  
    });

    function detailAction(data){
        alert(data);    
    } 
    function validAction(data){
        $("#valid").val(data);
        $('#dialogValid').modal('show');
    }
    function rejectAction(data){
        $("#reject").val(data);
        $('#dialogReject').modal('show');
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
                        Validasi
                        <small>Jamaah</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Validasi</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Validasi Jamaah</a></li>
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
                            <th class="hidden-phone" width='15%'>No. KTP</th>
                            <th class="hidden-phone" width='20%'>Nama Lengkap</th>
                            <th class="hidden-phone" width='15%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['jamaah'] as $jamaah)
                            @if( $jamaah->status == 1 )
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td class="hidden-phone">{{ $jamaah->no_ktp }}</td>
                                    <td class="hidden-phone">{{ $jamaah->namalengkap }}</td>
                                    <td class="hidden-phone">
                                        <center>
                                            <a href="{{ URL::asset('ketua/jamaah/'.$jamaah->no_ktp) }}" class="btn mini yellow icn-only editData"><i class="icon-check icon-white"></i> Detail</a>
                                            <a href="javascript:validAction({{ $jamaah->no_ktp }})" class="btn mini green icn-only"><i class="icon-check icon-white"></i> Valid</a>
                                            <a href="javascript:rejectAction({{ $jamaah->no_ktp }})" class="btn mini black"><i class="icon-trash"></i> Reject</a>
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

<div id="dialogValid" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Konfirmasi</h3>
    </div>
    <div class="modal-body">
        Apakah Anda Yakin Validasi Jamaah Ini?
        <input type="hidden" id="valid" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn btn-red" id="okValid">Ya</button>
    </div>
</div>

<div id="dialogReject" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Konfirmasi</h3>
    </div>
    <div class="modal-body">
        Apakah Anda Yakin Reject Jamaah Ini?
        <input type="hidden" id="reject" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn btn-red" id="okReject">Ya</button>
    </div>
</div>



@stop