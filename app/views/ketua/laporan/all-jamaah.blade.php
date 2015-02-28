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
<table class="laporan" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone" width='5%'>No.</th>
            <th class="hidden-phone" width='25%'>Nama Lengkap</th>
            <th class="hidden-phone" width='20%'>Pekerjaan</th>
            <th class="hidden-phone" width='10%'>Pendidikan</th>
            <th class="hidden-phone" width='10%'>Umur</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($data['user'] as $user)
        @if( $user->idusertype == 2 )
        <tr>
            <td>{{ $no }}</td>
            <td class="hidden-phone">{{ $user->jamaah->namalengkap }}</td>
            <td class="hidden-phone">{{ $user->jamaah->pekerjaan }}</td>
            <td class="hidden-phone">{{ $user->jamaah->pendidikan }}</td>
            <td class="hidden-phone">{{ $user->jamaah->umur }}</td>
        </tr>
        <?php $no++; ?>
        @endif
        @endforeach
    </tbody>
</table>