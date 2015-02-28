@extends('master')

@section('content')

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
                        <small>Edit User</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="#">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">User</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Edit User</a></li>
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
                            <h3>Data User </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone"><strong>Username</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Email</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>User Type</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->usertype->nama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="portlet-title">
                            <h3>Detail User </h3>
                        </div>
                        <div class="portlet-body">
                            {{ Form::model($data["user"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('ketua.user.update', $data["user"]->idusertype))) }}
                            <input type="hidden" name="iduser" value="{{ $data['user']->iduser }}">
                            @if( $data['user']->idusertype == 2 )
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>No. KTP</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->no_ktp }}" name="no_ktp" required readonly></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->namalengkap }}" name="namalengkap" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->ayah }}" name="ayah" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->tempat_lahir }}" name="tempat_lahir" required>,  
                                            <input name="tanggal_lahir" class="span12 m-wrap" type="date" value="{{ substr(($data['user']->jamaah->tanggal_lahir), 0, 10) }}">
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Umur</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->umur }}" name="umur" required></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Jenis Kelamin</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="jenis_kelamin" tabindex="1">
                                                @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'JK' )
                                                @if ( $data['user']->jamaah->jenis_kelamin == $pu->id)
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
                                                @if ( $data['user']->jamaah->warga_negara == $pu->id)
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
                                            <textarea class="span12 m-wrap" rows="3" name="alamat">{{ $data['user']->jamaah->alamat }}</textarea>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Desa / Kelurahan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->kelurahan }}" name="kelurahan" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Kecamatan</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->kecamatan }}" name="kecamatan" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kabupaten</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->kabupaten }}" name="kabupaten" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Propinsi</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->propinsi }}" name="propinsi" required></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kode Pos</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->kode_pos }}" name="kode_pos" required>
                                        </td>
                                        <td class="hidden-phone"><strong>No. Telepon</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->no_telp }}" name="no_telp" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pendidikan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->pendidikan }}" name="pendidikan" required>
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->pekerjaan }}" name="pekerjaan" required>
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
                                                @if ( $data['user']->jamaah->pernah_haji_umroh == $pu->id)
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
                                            <input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->nama_mahram }}" name="nama_mahram" required>
                                        </td>
                                        <td class="hidden-phone"><strong>Hubungan Mahram</strong></td>
                                        <td class="hidden-phone">
                                            <select class="span12 m-wrap" data-placeholder="Choose a Category" name="hub_mahram" tabindex="1">
                                            @foreach ( $data['generic'] as $pu )
                                                @if( $pu->type == 'MAHRAM' )
                                                @if ( $data['user']->jamaah->hub_mahram == $pu->id)
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
                                                @if ( $data['user']->jamaah->gol_darah == $pu->id)
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
                                    @foreach ( $data['user']->jamaah->transaksi as $transaksi )
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
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->rambut }}" name="rambut" required></td>
                                            <td class="hidden-phone"><strong>Alis</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->alis }}" name="alis" required></td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Hidung</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->hidung }}" name="hidung" required></td>
                                            <td class="hidden-phone"><strong>Muka</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->jamaah->muka }}" name="muka" required></td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Tinggi</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['user']->jamaah->tinggi }}" name="tinggi" required></td>
                                            <td class="hidden-phone"><strong>Berat Badan</strong></td>
                                            <td class="hidden-phone"><input class="span12 m-wrap" type="number" value="{{ $data['user']->jamaah->berat_badan }}" name="berat_badan" required></td>
                                        </tr>
                                    </tbody>
                            </table>
                            @else
                            <input type="hidden" name="idpegawai" value="{{ $data['user']->pegawai->idpegawai }}">
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone"><input class="span12 m-wrap" type="text" value="{{ $data['user']->pegawai->namalengkap }}" name="namalengkap" required/></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alamat</strong></td>
                                        <td class="hidden-phone"><textarea class="span12 m-wrap" rows="3" name="alamat">{{ $data['user']->pegawai->alamat }}</textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            <div class="modal-footer">
                                <button class="btn green">Update</button>
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