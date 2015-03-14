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
                            <small>Edit Pengambilan Passport</small>
                        @else
                            Pembuatan Passport
                            <small>Edit Pembuatan Passport</small>
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
                                @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                    Pengambilan Passport
                                @else
                                    Pembuatan Passport
                                @endif
                            </a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">
                                @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                    Edit Pengambilan Passport
                                @else
                                    Edit Pembuatan Passport
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
                                @if( $data['passport']->uraian == 'Pengambilan Buku Passport' )
                                    Data Pengambilan Passport
                                @else
                                    Data Pembuatan Passport
                                @endif
                            </h3>
                        </div>
                        <div class="portlet-body">
                        {{ Form::model($data["passport"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('staff.passport.update', $data["passport"]->idpassport))) }}
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
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="date" value="{{ $data['passport']->tanggal_pembuatan }}" name="tanggal_pembuatan" required></td>
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
                                            <input class="span12 m-wrap" type="text" value="{{ $data['passport']->waktu_pembuatan_awal }}" name="waktu_pembuatan_awal" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" required>
                                            Sampai:
                                            <input class="span12 m-wrap" type="text" value="{{ $data['passport']->waktu_pembuatan_akhir }}" name="waktu_pembuatan_akhir" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" required>
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
                                            <input class="span12 m-wrap" type="text" value="{{ $data['passport']->tempat_pembuatan }}" name="tempat_pembuatan" required>
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
                                            @foreach( $data['passport']->detailpassport as $detail )
                                            <tr>
                                                <td class="hidden-phone" width="10%"><strong>{{ $detail->jamaah->no_ktp }}</strong></td>
                                                <td class="hidden-phone" width="80%">{{ $detail->jamaah->namalengkap }}</td>
                                                <td align="right" width="10%">
                                                    <a href="{{ URL::asset('staff/passport-jamaah/delete/'.$detail->iddetailpassport) }}" class="btn mini black"><i class="icon-trash"></i> Delete</a>
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