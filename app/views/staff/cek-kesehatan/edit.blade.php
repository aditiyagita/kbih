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
						@if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                            Pengambilan Buku Hijau
                            <small>Edit Pengambilan Buku Hijau</small>
                        @else
                            Cek Kesehatan
                            <small>Edit Cek Kesehatan</small>
                        @endif
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ URL::asset('/') }}">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">
                                @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                    Pengambilan Buku Hijau
                                @else
                                    Cek Kesehatan
                                @endif
                            </a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">
                                @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                    Edit Pengambilan Buku Hijau
                                @else
                                    Edit Cek Kesehatan
                                @endif
                        </a></li>
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
                                Edit
                                <small>{{ $data['cekkesehatan']->jenis_pemeriksaan }}</small>
                            </h3>
                        </div>
                        <div class="portlet-body">
                        {{ Form::model($data["cekkesehatan"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('staff.cek-kesehatan.update', $data["cekkesehatan"]->idcekkesehatan))) }}
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%">
                                            @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                                <strong>Tanggal Pengambilan</strong>
                                            @else
                                                <strong>Tanggal Pemeriksaan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="date" value="{{ $data['cekkesehatan']->tanggal_pemeriksaan }}" name="tanggal_pemeriksaan" required></td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone">
                                            @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                                <strong>Uraian</strong>
                                            @else
                                                <strong>Jenis Pemeriksaan</strong>
                                            @endif</td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['cekkesehatan']->jenis_pemeriksaan }}" name="jenis_pemeriksaan" required readonly></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone">
                                            @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                                <strong>Waktu Pengambilan</strong>
                                            @else
                                                <strong>Waktu Pemeriksaan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone">
                                            Dari:
                                            <input class="span12 m-wrap" type="text" value="{{ $data['cekkesehatan']->waktu_pemeriksaan_mulai }}" name="waktu_pemeriksaan_mulai" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" required>
                                            Sampai:
                                            <input class="span12 m-wrap" type="text" value="{{ $data['cekkesehatan']->waktu_pemeriksaan_selesai }}" name="waktu_pemeriksaan_selesai" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" required>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone">
                                            @if( $data['cekkesehatan']->jenis_pemeriksaan == 'Pengambilan Buku Hijau' )
                                                <strong>Tempat Pengambilan</strong>
                                            @else
                                                <strong>Tempat Pemeriksaan</strong>
                                            @endif
                                        </td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['cekkesehatan']->tempat_pemeriksaan }}" name="tempat_pemeriksaan" required>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                </body>
                            </table>

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
                                                <td align="right" width="10%">
                                                    <a href="{{ URL::asset('staff/cek-kesehatan-jamaah/delete/'.$detail->iddetailcekkesehatan) }}" class="btn mini black"><i class="icon-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </body>
                                    </table>
                                </div>
                            </div>

                            <div class="form-actions">
                              <input type="submit" value="Update" class="btn green"/>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                        {{ Form::close() }}
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