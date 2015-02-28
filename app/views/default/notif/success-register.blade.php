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
}
table.laporan thead td{
    font-size: 12pt;
    padding-top: 5px;
    padding-bottom: 5px;
}
table.laporan tbody td{
    padding-left:8px;
    padding-top: 2px;
    padding-bottom: 2px;
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
                    KBIH PESANTREN AL KARIMIYAH
                    <br>
                    <p>Jl. H. Maksum No. 23 RT 04/02 Kel. Sawangan Baru 
                        <br>
                        Kec. Sawangan Kota Depok 16511</p>
                    </h3>
                </td>
            </tr>
        </table>
        <hr>
        <center><h3>FORMULIR PENDAFTARAN HAJI</h3></center>
        <table class="laporan" width="100%">
            <tbody>
                <tr>
                    <td class="hidden-phone" width="32%"><strong>No. KTP</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->no_ktp }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->namalengkap }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->ayah }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                    <td class="hidden-phone" colspan=3>
                        {{ $data['user']->jamaah->tempat_lahir }}, 
                        {{ date("d M Y", strtotime( $data['user']->jamaah->tanggal_lahir ) ) }}
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Umur</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->umur }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Jenis Kelamin</strong></td>
                    <td class="hidden-phone" colspan=3>
                        @foreach ( $data['generic'] as $pu )
                        @if ( $data['user']->jamaah->jenis_kelamin == $pu->id)
                        {{ $pu->desc }}
                        <?php break; ?>
                        @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Kewarganegaraan</strong></td>
                        <td class="hidden-phone" colspan=3>
                            @foreach ( $data['generic'] as $wn )
                            @if ( $data['user']->jamaah->warga_negara == $wn->id)
                            {{ $wn->desc }}
                            <?php break; ?>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Alamat</strong></td>
                        <td class="hidden-phone" colspan=3>
                            {{ $data['user']->jamaah->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Desa / Kelurahan</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->kelurahan }}</td>
                        <td class="hidden-phone" width="20%"><strong>Kecamatan</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Kabupaten</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->kabupaten }}</td>
                        <td class="hidden-phone" width="20%"><strong>Propinsi</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->propinsi }}</td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Kode Pos</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->kode_pos }}</td>
                        <td class="hidden-phone"><strong>No. Telp</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->no_telp }}</td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Pendidikan</strong></td>
                        <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                        <td class="hidden-phone" colspan=3>{{ $data['user']->jamaah->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Pergi Haji</strong></td>
                        <td class="hidden-phone" colspan=3>
                            @foreach ( $data['generic'] as $wn )
                            @if ( $data['user']->jamaah->pernah_haji_umroh == $wn->id)
                            {{ $wn->desc }}
                            <?php break; ?>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden-phone"><strong>Nama Mahram</strong></td>
                        <td class="hidden-phone">{{ $data['user']->jamaah->nama_mahram }}</td>
                        <td class="hidden-phone"><strong>Hub. Mahram</strong></td>
                        <td class="hidden-phone">
                            @foreach ( $data['generic'] as $wn )
                            @if ( $data['user']->jamaah->hub_mahram == $wn->id)
                            {{ $wn->desc }}
                            <?php break; ?>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr><td class="hidden-phone"><strong>Golongan Darah</strong></td>
                        <td class="hidden-phone" colspan=3>
                            @foreach ( $data['generic'] as $pu )
                            @if( $pu->type == 'GOL DARAH' )
                            @if ( $data['user']->jamaah->gol_darah == $pu->id)
                            {{ $pu->desc }}
                            @endif
                            @endif
                            @endforeach
                        </td>
                    </tr>
                <tr>
                    <td class="hidden-phone"><strong>Tahun Keberangkatan</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['transaksi']->tahun_keberangkatan }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>No. SPPH</strong></td>
                    <td class="hidden-phone" colspan=3>{{ $data['transaksi']->no_spph }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Status Jamaah</strong></td>
                    <td class="hidden-phone" colspan=3>
                            @foreach ( $data['generic'] as $wn )
                            @if ( $data['transaksi']->status_jamaah == $wn->id)
                            {{ $wn->desc }}
                            <?php break; ?>
                            @endif
                            @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Rambut</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->rambut }}</td>
                    <td class="hidden-phone"><strong>Alis</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->alis }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Hidung</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->hidung }}</td>
                    <td class="hidden-phone"><strong>Muka</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->muka }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Tinggi</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->tinggi }}</td>
                    <td class="hidden-phone"><strong>Berat Badan</strong></td>
                    <td class="hidden-phone">{{ $data['user']->jamaah->berat_badan }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width=100%>
            <tr>
                <td width="20%"><img src="{{ public_path().'/images/user/'.$data['user']->jamaah->foto }}" width="150px"/></td>
                <td width="20%"></td>
                <td align="right" width="50%">
                    <BR><BR><BR>
                    <center>
                        -------------------------------------------<br>
                        ( {{ $data['user']->jamaah->namalengkap }} )
                    </center>
                </td>
                <td width="10%"></td>
            </tr>
        </table>