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
                    JADWAL BIMBINGAN HAJI / UMROH
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
<table class="laporan" id="sample_3" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone" width='5%'>No.</th>
            <th class="hidden-phone" width='15%'>Bimbingan Ke-</th>
            <th class="hidden-phone" width='15%'>Tanggal</th>
            <th class="hidden-phone" width='15%'>Waktu</th>
            <th class="hidden-phone" width='10%'>Tempat</th>
            <th class="hidden-phone" width='15%'>Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($data['bimbingan'] as $bimbingan)
        <tr>
            <td>{{ $no }}</td>
            <td class="hidden-phone">Bimbingan Ke {{ $no }}</td>
            <td class="hidden-phone">{{ $bimbingan->tanggal_bimbingan }}</td>
            <td class="hidden-phone">{{ $bimbingan->waktu_bimbingan_awal }} - {{ $bimbingan->waktu_bimbingan_akhir }}</td>
            <td class="hidden-phone">{{ $bimbingan->tempat_bimbingan }}</td>
            <td class="hidden-phone">{{ $bimbingan->nama_pembimbing }}</td>
        </tr>
        <?php $no++; ?>
        @endforeach
    </tbody>
</table>