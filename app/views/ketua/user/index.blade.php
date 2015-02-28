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
            var url = "{{ URL::asset('ketua/user/delete') }}/"+i;    
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
                        User
                        <small>Manage User</small>
                        <a href="#myModal1" role="button" class="btn green big" data-toggle="modal" style="float:right"><i class="icon-plus-sign"></i> Add Karyawan</a>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">User</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Manage User</a></li>
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
                            <th class="hidden-phone" width='20%'>Email</th>
                            <th class="hidden-phone" width='20%'>User Type</th>
                            <th class="hidden-phone" width='20%'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data['user'] as $user)
                        <tr>
                            <td>{{ $no }}</td>
                            <td class="hidden-phone">
                                @if( $user->idusertype == 2 )
                                    {{ $user->jamaah->namalengkap }}
                                @else
                                    {{ $user->pegawai->namalengkap }}
                                @endif
                            </td>
                            <td class="hidden-phone">{{ $user->email }}</td>
                            <td class="hidden-phone">{{ $user->usertype->nama }}</td>
                            <td class="hidden-phone">
                                <center>
                                    <a href="{{ URL::asset('ketua/user/'.$user->iduser) }}" class="btn mini yellow icn-only editData"><i class="icon-check icon-white"></i> Detail</a>
                                    <a href="{{ URL::asset('ketua/user/'.$user->iduser.'/edit') }}" class="btn mini green icn-only editData"><i class="icon-check icon-white"></i> Edit</a>
                                    <a href="javascript:hapusAction({{ $user->iduser }})" class="btn mini black"><i class="icon-trash"></i> Delete</a>
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
        Apakah yakin untuk menghapus?
        <input type="hidden" id="id" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn btn-red" id="okHapus">Ya</button>
    </div>
</div>


<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    {{ Form::open(array('route' => 'ketua.user.store', 'class' => 'form-horizontal')) }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Input Karyawan</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">
                <input class="m-wrap large" type="text" name="username" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input class="m-wrap large" type="text" value="" name="password" required> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input class="m-wrap large" type="email" name="email" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Lengkap</label>
            <div class="controls">
                <input class="m-wrap large" type="text" value="" name="namalengkap" required> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat</label>
            <div class="controls">
                <textarea class="large m-wrap" rows="3" name="alamat"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">User Type</label>
            <div class="controls">
                <select class="large m-wrap" tabindex="1" name="idusertype">
                    <option SELECTED>-- Pilih User Type --</option>
                    @foreach($data['usertype'] as $usertype)
                        @if( $usertype->idusertype != 2 )
                            <option value="{{ $usertype->idusertype }}">{{ $usertype->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn green">Save</button>
        </div>
        {{ Form::close() }}
    </div>
</div>


@stop