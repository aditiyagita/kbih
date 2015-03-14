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
                    JADWAL PEMBUATAN & PENGAMBILAN PASSPORT 
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
    <h2>Pembuatan Passport</h2>
<table class="laporan" id="sample_3" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone" width='5%'>No.</th>
            <th class="hidden-phone" width='20%'>Tanggal Pembuatan</th>
            <th class="hidden-phone" width='15%'>Waktu Pembuatan</th>
            <th class="hidden-phone" width='15%'>Tempat Pembuatan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($data['passport'] as $passport)
            @if($passport->uraian != 'Pengambilan Buku Passport')
                <tr>
                    <td>{{ $no }}</td>
                    <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                    <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                    <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                </tr>
                <?php $no++; ?>
            @endif
        @endforeach
    </tbody>
</table>
<br>
<h2>Pengambilan Passport</h2>
<table class="laporan" id="sample_3" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone" width='5%'>No.</th>
            <th class="hidden-phone" width='20%'>Tanggal Pengambilan</th>
            <th class="hidden-phone" width='15%'>Waktu Pengambilan</th>
            <th class="hidden-phone" width='15%'>Tempat Pengambilan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($data['passport'] as $passport)
            @if($passport->uraian == 'Pengambilan Buku Passport')
                <tr>
                    <td>{{ $no }}</td>
                    <td class="hidden-phone">{{ date("d M Y", strtotime( $passport->tanggal_pembuatan ) ) }}</td>
                    <td class="hidden-phone">{{ $passport->waktu_pembuatan_awal }} - {{ $passport->waktu_pembuatan_akhir }}</td>
                    <td class="hidden-phone">{{ $passport->tempat_pembuatan }}</td>
                </tr>
                <?php $no++; ?>
            @endif
        @endforeach
    </tbody>
</table>