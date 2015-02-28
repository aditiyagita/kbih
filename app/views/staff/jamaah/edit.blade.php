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
						Jamaah
						<small>Detail Jamaah</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ URL::asset('/') }}">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ URL::asset('staff/jamaah') }}">Jamaah</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Detail Jamaah</a></li>
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
                                Data Jamaah
                                <small>{{ $data['jamaah']->namalengkap }}</small>
                            </h3>
                        </div>
                        <div class="portlet-body">
                        {{ Form::model($data["jamaah"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('staff.jamaah.update', $data["jamaah"]->no_ktp))) }}
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>No. KTP</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->no_ktp }}" name="no_ktp" required readonly></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->namalengkap }}" name="namalengkap" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->ayah }}" name="ayah" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->tempat_lahir }}" name="tempat_lahir" required>,  
                                            <input name="tanggal_lahir" class="span12 m-wrap" type="date" value="{{ substr(($data['jamaah']->tanggal_lahir), 0, 10) }}">
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Umur</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->umur }}" name="umur" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Jenis Kelamin</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="jenis_kelamin" tabindex="1">
                                                @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'JK' )
                                                @if ( $data['jamaah']->jenis_kelamin == $pu->id)
                                                <option value="{{ $pu->id }}" SELECTED>{{ $pu->desc }}</option>
                                                @else
                                                <option value="{{ $pu->id }}">{{ $pu->desc }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Warga Negara</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="warga_negara" tabindex="1">
                                                @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'WARGANEGARA' )
                                                @if ( $data['jamaah']->warga_negara == $pu->id)
                                                <option value="{{ $pu->id }}" SELECTED>{{ $pu->desc }}</option>
                                                @else
                                                <option value="{{ $pu->id }}">{{ $pu->desc }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alamat</strong></td>
                                        <td class="hidden-phone">
                                            <textarea class="span12 m-wrap" rows="3" name="alamat">{{ $data['jamaah']->alamat }}</textarea>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Desa / Kelurahan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kelurahan }}" name="kelurahan" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Kecamatan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kecamatan }}" name="kecamatan" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kabupaten</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kabupaten }}" name="kabupaten" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Propinsi</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->propinsi }}" name="propinsi" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kode Pos</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kode_pos }}" name="kode_pos" required>
                                        </td>
                                        <td class="hidden-phone"><strong>No. Telepon</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->no_telp }}" name="no_telp" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pendidikan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->pendidikan }}" name="pendidikan" required>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->pekerjaan }}" name="pekerjaan" required>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pernah Haji / Umroh</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="pernah_haji_umroh" tabindex="1">
                                                @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'PERGI UMRAH' )
                                                @if ( $data['jamaah']->pernah_haji_umroh == $pu->id)
                                                <option value="{{ $pu->id }}" SELECTED>{{ $pu->desc }}</option>
                                                @else
                                                <option value="{{ $pu->id }}">{{ $pu->desc }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Mahram</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->nama_mahram }}" name="nama_mahram" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Hubungan Mahram</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="hub_mahram" tabindex="1">
                                            @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'MAHRAM' )
                                                @if ( $data['jamaah']->hub_mahram == $pu->id)
                                                <option value="{{ $pu->id }}" SELECTED>{{ $pu->desc }}</option>
                                                @else
                                                <option value="{{ $pu->id }}">{{ $pu->desc }}</option>
                                                @endif
                                                @endif
                                            @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Golongan Darah</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="gol_darah" tabindex="1">
                                            @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'GOL DARAH' )
                                                @if ( $data['jamaah']->gol_darah == $pu->id)
                                                <option value="{{ $pu->id }}" SELECTED>{{ $pu->desc }}</option>
                                                @else
                                                <option value="{{ $pu->id }}">{{ $pu->desc }}</option>
                                                @endif
                                                @endif
                                            @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone"</td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3>Pendaftaran Bimbingan </h3>
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    @foreach ( $data['jamaah']->transaksi as $transaksi )
                                    <tr>
                                        <td class="hidden-phone"><strong>Layanan</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $transaksi->layanan == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Tahun Keberangkatan</strong></td>
                                        <td class="hidden-phone">{{ $transaksi->tahun_keberangkatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>No. SPPH</strong></td>
                                        <td class="hidden-phone">{{ $transaksi->no_spph }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Status Jamaah</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $transaksi->status_jamaah == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Paket Umroh</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $transaksi->paket == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kamar</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if ( $transaksi->kamar == $pu->id)
                                            {{ $pu->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h3>Ciri - Ciri </h3>
                            <table class="table table-striped" id="sample_3">
                                    <tbody>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Rambut</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->rambut }}" name="rambut" required></td>
                                            <td class="hidden-phone"><strong>Alis</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->alis }}" name="alis" required></td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Hidung</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->hidung }}" name="hidung" required></td>
                                            <td class="hidden-phone"><strong>Muka</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->muka }}" name="muka" required></td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Tinggi</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['jamaah']->tinggi }}" name="tinggi" required></td>
                                            <td class="hidden-phone"><strong>Berat Badan</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['jamaah']->berat_badan }}" name="berat_badan" required></td>
                                        </tr>
                                    </tbody>
                            </table>
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