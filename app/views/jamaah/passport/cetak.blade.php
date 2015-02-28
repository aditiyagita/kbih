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
                    JADWAL PEMBUATAN PASSPORT
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
<center><h4>SURAT PENGANTAR PEMBUATAN PASSPORT JAMAAH KBIH AL KARIMIYAH</h4></center>
<table class="laporan" id="sample_3" width="100%">
    <tbody>
        <tr>
            <td width="25%">Nama Jamaah</td>
            <td>{{ $data['passport']->jamaah->namalengkap }}</td>
        </tr>
        <tr>
            <td width="25%">Tanggal Pembuatan</td>
            <td>{{ date("d M Y", strtotime( $data['passport']->passport->tanggal_pembuatan ) ) }}</td>
        </tr>
        <tr>
            <td width="25%">Waktu Pembuatan</td>
            <td>Dari : {{ $data['passport']->passport->waktu_pembuatan_awal }} Sampai Dengan : {{ $data['passport']->passport->waktu_pembuatan_akhir }}</td>
        </tr>
        <tr>
            <td width="25%">Tempat Pembuatan</td>
            <td>{{ $data['passport']->passport->tempat_pembuatan }}</td>
        </tr>
    </tbody>
</table>
<table width="100%">
    <tr>
        <td><br><br><br><br></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%"><center>( {{ Auth::user()->jamaah->namalengkap }} )</center></td>
        <td width="50%"><center>( {{ $data['user']->pegawai->namalengkap }} )</center></td>
    </tr>
</table>
