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
                        <small>Detail User</small>
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
                        <li><a href="#">Detail User</a></li>
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
                            @if( $data['user']->idusertype == 2 )
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>No. KTP</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->no_ktp }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->namalengkap }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->ayah }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                                        <td class="hidden-phone">
                                            {{ $data['user']->jamaah->tempat_lahir }},  
                                            {{ substr(($data['user']->jamaah->tanggal_lahir), 0, 10) }}
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Umur</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->umur }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Jenis Kelamin</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if( $pu->type == 'JK' )
                                            @if ( $data['user']->jamaah->jenis_kelamin == $pu->id)
                                            {{ $pu->desc }}
                                            @else
                                            {{ $pu->desc }}
                                            @endif
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Warga Negara</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $wn )
                                            @if ( $data['user']->jamaah->warga_negara == $wn->id)
                                            {{ $wn->desc }}
                                            <?php break; ?>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alamat</strong></td>
                                        <td class="hidden-phone">
                                            {{ $data['user']->jamaah->alamat }}
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Desa / Kelurahan</strong></td>
                                        <td class="hidden-phone">
                                            {{ $data['user']->jamaah->kelurahan }}
                                        </td>
                                        <td class="hidden-phone"><strong>Kecamatan</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kabupaten</strong></td>
                                        <td class="hidden-phone">
                                            {{ $data['user']->jamaah->kabupaten }}
                                        </td>
                                        <td class="hidden-phone"><strong>Propinsi</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->propinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kode Pos</strong></td>
                                        <td class="hidden-phone">
                                            {{ $data['user']->jamaah->kode_pos }}
                                        </td>
                                        <td class="hidden-phone"><strong>No. Telepon</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pendidikan</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->pendidikan }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->pekerjaan }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Pernah Haji / Umroh</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->pernah_haji_umroh }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Mahram</strong></td>
                                        <td class="hidden-phone">{{ $data['user']->jamaah->nama_mahram }}</td>
                                        <td class="hidden-phone"><strong>Hubungan Mahram</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if( $pu->type == 'MAHRAM' )
                                            @if ( $data['user']->jamaah->hub_mahram == $pu->id)
                                            {{ $pu->desc }}
                                            @endif
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Golongan Darah</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $pu )
                                            @if( $pu->type == 'GOL DARAH' )
                                            @if ( $data['user']->jamaah->gol_darah == $pu->id)
                                            {{ $pu->desc }}
                                            @endif
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"></td>
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
                                            <td class="hidden-phone">{{ $data['user']->jamaah->rambut }}</td>
                                            <td class="hidden-phone"><strong>Alis</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->jamaah->alis }}</td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Hidung</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->jamaah->hidung }}</td>
                                            <td class="hidden-phone"><strong>Muka</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->jamaah->muka }}</td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Tinggi</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->jamaah->tinggi }}</td>
                                            <td class="hidden-phone"><strong>Berat Badan</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->jamaah->berat_badan }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            @else

                                <table class="table table-striped" id="sample_3">
                                    <tbody>
                                        <tr>
                                            <td class="hidden-phone" width="25%"><strong>Nama Lengkap</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->pegawai->namalengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td class="hidden-phone"><strong>Alamat</strong></td>
                                            <td class="hidden-phone">{{ $data['user']->pegawai->alamat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
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