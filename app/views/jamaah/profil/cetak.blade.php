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
        <center><h3>FORMULIR PENDAFTARAN UMROH</h3></center>

        <h3 class="block-div">User Profile</h3>
        <table class="laporan" width="100%">
            <tbody>
                <tr>
                    <td class="hidden-phone" width="25%"><strong>No. KTP</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->no_ktp }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->namalengkap }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Nama Ayah</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->ayah }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Tempat, Tanggal Lahir</strong></td>
                    <td class="hidden-phone">
                        {{ $data['jamaah']->tempat_lahir }},  
                        {{ substr(($data['jamaah']->tanggal_lahir), 0, 10) }}
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Umur</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->umur }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Jenis Kelamin</strong></td>
                    <td class="hidden-phone">
                            @foreach ( $data['generic'] as $pu )
                            @if ( $data['jamaah']->jenis_kelamin == $pu->id)
                                {{ $pu->desc }}
                            @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Pendidikan</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->pendidikan }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Pekerjaan</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->pekerjaan }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Warga Negara</strong></td>
                    <td class="hidden-phone">
                            @foreach ( $data['generic'] as $pu )
                            @if ( $data['jamaah']->warga_negara == $pu->id)
                                {{ $pu->desc }}
                            @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Alamat</strong></td>
                    <td class="hidden-phone">
                        {{ $data['jamaah']->alamat }}
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Kode Pos</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->kode_pos }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Kelurahan</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->kelurahan }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Kecamatan</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->kecamatan }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Kabupaten</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->kabupaten }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Propinsi</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->propinsi }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>No. Telp</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->no_telp }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Golongan Darah</strong></td>
                    <td class="hidden-phone">
                            @foreach ( $data['generic'] as $pu )
                            @if ( $data['jamaah']->gol_darah == $pu->id)
                                {{ $pu->desc }}
                            @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3 class="block-div">Ciri-Ciri</h3>
        <table class="laporan" width="100%">
            <tbody>
                <tr>
                    <td class="hidden-phone" width="25%"><strong>Rambut</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->rambut }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Alis</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->alis }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Hidung</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->hidung }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Muka</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->muka }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Tinggi</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->tinggi }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Berat Badan</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->berat_badan }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3 class="block-div">Bimbingan Haji / Umroh</h3>
        <table class="laporan" width="100%">
            <tbody>
                <tr>
                    <td class="hidden-phone" width="25%"><strong>Pernah Haji / Umroh</strong></td>
                    <td class="hidden-phone">
                            @foreach ( $data['generic'] as $pu )
                            @if ( $data['jamaah']->pernah_haji_umroh == $pu->id)
                                {{ $pu->desc }}
                            @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Nama Mahram</strong></td>
                    <td class="hidden-phone">{{ $data['jamaah']->nama_mahram }}</td>
                </tr>
                <tr>
                    <td class="hidden-phone"><strong>Hubungan Mahram</strong></td>
                    <td class="hidden-phone">
                            @foreach ( $data['generic'] as $pu )
                            @if ( $data['jamaah']->hub_mahram == $pu->id)
                                {{ $pu->desc }}
                            @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>