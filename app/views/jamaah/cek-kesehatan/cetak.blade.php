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
                    @if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
                        JADWAL CEK KESEHATAN
                    @else
                        JADWAL PENGAMBILAN BUKU HIJAU
                    @endif
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
@if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
<center><h4>SURAT PENGANTAR CEK KESEHATAN JAMAAH KBIH AL KARIMIYAH</h4></center>
@endif
<table class="laporan" id="sample_3" width="100%">
    <tbody>
        <tr>
            <td width="25%">Nama Jamaah</td>
            <td>{{ $data['cekkesehatan']->transaksi->jamaah->namalengkap }}</td>
        </tr>
        <tr>
            <td width="25%">
                @if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
                    Jenis Pemeriksaan
                @else
                    Uraian
                @endif
            </td>
            <td>{{ $data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan }}</td>
        </tr>
        <tr>
            <td width="25%">
                @if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
                    Tempat Pemeriksaan
                @else
                    Tempat Pengambilan
                @endif
            </td>
            <td>{{ $data['cekkesehatan']->cekkesehatan->tempat_pemeriksaan }}</td>
        </tr>
        <tr>
            <td width="25%">
                @if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
                    Tanggal Pemeriksaan
                @else
                    Tanggal Pengambilan
                @endif
            </td>
            <td>{{ date("d M Y", strtotime( $data['cekkesehatan']->cekkesehatan->tanggal_pemeriksaan ) ) }}</td>
        </tr>
    </tbody>
</table>
@if($data['cekkesehatan']->cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
<table width="100%">
    <tr>
        <td><br><br><br><br></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td width="30%"><center>( {{ Auth::user()->jamaah->namalengkap }} )</center></td>
        <td width="30%"><center>( Nama Pemeriksa )</center></td>
        <td width="30%"><center>( {{ $data['user']->pegawai->namalengkap }} )</center></td>
    </tr>
</table>
@endif