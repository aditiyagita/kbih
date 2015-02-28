@extends('master')

@section('content')
<style type="text/css">
 .block-div{
    width: 100%;
    padding: 3px;
    background-color: #35aa47 !important;
    color: #fff;
 }
</style>
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
                                Data Jamaah
                                <small>{{ $data['jamaah']->namalengkap }}</small>
                                <a href="{{ URL::asset('jamaah/my-profile/cetak') }}" class="btn green big" style="float:right"><i class="icon-print"></i> Cetak</a>
                            </h3>
                        </div>
                        <div class="portlet-body">
                            {{ Form::model($data["jamaah"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('jamaah.my-profile.update', $data["jamaah"]->no_ktp))) }}
                            <table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td colspan=2>
                                            <h3 class="block-div">User Profile</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>No. KTP</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->no_ktp }}" name="no_ktp" required readonly></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->namalengkap }}" name="namalengkap" required></td>
                                   </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->ayah }}" name="ayah" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->tempat_lahir }}" name="tempat_lahir" required>,  
                                            <input name="tanggal_lahir" class="span12 m-wrap" type="date" value="{{ substr(($data['jamaah']->tanggal_lahir), 0, 10) }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Umur</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->umur }}" name="umur" required></td>
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
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pendidikan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->pendidikan }}" name="pendidikan" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->pekerjaan }}" name="pekerjaan" required></td>
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
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alamat</strong></td>
                                        <td class="hidden-phone">
                                            <textarea class="span12 m-wrap" rows="3" name="alamat">{{ $data['jamaah']->alamat }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kode Pos</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kode_pos }}" name="kode_pos" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kelurahan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kelurahan }}" name="kelurahan" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kecamatan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kecamatan }}" name="kecamatan" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kabupaten</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->kabupaten }}" name="kabupaten" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Propinsi</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->propinsi }}" name="propinsi" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>No. Telp</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['jamaah']->no_telp }}" name="no_telp" required></td>
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
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            <h3 class="block-div">Ciri-Ciri</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Rambut</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->rambut }}" name="rambut" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alis</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->alis }}" name="alis" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Hidung</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->hidung }}" name="hidung" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Muka</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->muka }}" name="muka" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tinggi</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['jamaah']->tinggi }}" name="tinggi" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Berat Badan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['jamaah']->berat_badan }}" name="berat_badan" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            <h3 class="block-div">Bimbingan Haji / Umroh</h3>
                                        </td>
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
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Mahram</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['jamaah']->nama_mahram }}" name="nama_mahram" required></td>
                                    </tr>
                                    <tr>
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
                                </body>
                            </table>
                            <div class="form-actions">
                              <input type="submit" value="Update" class="btn green"/>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                        {{ Form::close() }}
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