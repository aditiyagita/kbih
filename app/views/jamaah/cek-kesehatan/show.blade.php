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
                    JADWAL CEK KESEHATAN <br>DAN <br>PENGAMBILAN BUKU HIJAU
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
    <h2>Cek Kesehatan</h2>
<table class="laporan" id="sample_3" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone">No.</th>
            <th class="hidden-phone">Jenis Pemeriksaan</th>
            <th class="hidden-phone">Waktu Pemeriksaan</th>
            <th class="hidden-phone">Tempat Pemeriksaan</th>
            <th class="hidden-phone">Tanggal Pemeriksaan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach( $data['cekkesehatan'] as $cekkesehatan )
            @if( $cekkesehatan->jenis_pemeriksaan != 'Pengambilan Buku Hijau')
                <tr>
                    <td class="hidden-phone">{{ $i }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->jenis_pemeriksaan }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->waktu_pemeriksaan_mulai }} - {{ $cekkesehatan->waktu_pemeriksaan_selesai }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->tempat_pemeriksaan }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->tanggal_pemeriksaan }}</td>
                </tr>
                <?php $i++; ?>
            @endif
        @endforeach
    </tbody>
</table>
<br>
<h2>Pengambilan Buku Hijau</h2>
<table class="laporan" id="sample_3" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone">No.</th>
            <th class="hidden-phone">Uraian</th>
            <th class="hidden-phone">Waktu Pengambilan</th>
            <th class="hidden-phone">Tempat Pengambilan</th>
            <th class="hidden-phone">Tanggal Pengambilan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach( $data['cekkesehatan'] as $cekkesehatan )
            @if( $cekkesehatan->jenis_pemeriksaan == 'Pengambilan Buku Hijau')
                <tr>
                    <td class="hidden-phone">{{ $i }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->jenis_pemeriksaan }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->waktu_pemeriksaan_mulai }} - {{ $cekkesehatan->waktu_pemeriksaan_selesai }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->tempat_pemeriksaan }}</td>
                    <td class="hidden-phone">{{ $cekkesehatan->tanggal_pemeriksaan }}</td>
                </tr>
                <?php $i++; ?>
            @endif
        @endforeach
    </tbody>
</table>