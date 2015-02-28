<style type="text/css">

@page teacher {
  size: A4 portrait;
  margin: 2cm;
}

.teacherPage {
   page: teacher;
   page-break-after: always;
}
body {
    padding : 10px;
    font-family: 'Roboto', sans-serif;
}
p{
    padding: 5px;
}

table.laporan
{
    border-collapse:collapse;
}
table.laporan, table.laporan th, table.laporan td
{
    border: 1px solid black;
    margin-bottom: 10px;
}
table.laporan thead td{
    font-size: 12pt;
    padding-top: 3px;
    padding-bottom: 3px;
}
table.laporan tbody td{
    padding-left:8px;
    padding-top: 3px;
    padding-bottom: 3px;
    font-size: 9pt;
}
.lampiran{
    font-size: 9pt;
}

</style>

<table width=100%>
    <tr>
        <td colspan=3><img src="{{ public_path().'/images/logo-small.png' }}" width="150px"/></td>
        <td align="right" colspan=4>
            <h3>
                <BR>
                    LAPORAN DATA JAMAAH
                    <br>
                    KBIH PESANTREN AL KARIMIYAH
                    <br>
                    <p>Jl. H. Maskum No. 23 RT 04/02 Kel. Sawangan Baru 
                        <br>
                        Kec. Sawangan Kota Depok 16511</p>
                    </h3>
                </td>
            </tr>
        </table>
        <hr>
        <h3>Profil {{ $data['user']->jamaah->namalengkap }} </h3>
        <table class="laporan" width="100%">
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
        <table class="laporan" width="100%">
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
        <table class="laporan" width="100%">
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