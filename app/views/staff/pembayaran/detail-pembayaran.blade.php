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
<center><h3>TANDA PEMBAYARAN LAYANAN UMROH / HAJI KBIH AL KARIMIYAH</h3></center>
<table class="laporan" width="100%">
    <tbody>
        <tr>
            <td class="hidden-phone" width="20%"><strong>Nama Jamaah</strong></td>
            <td class="hidden-phone">{{ $data['transaksi']->jamaah->namalengkap }}</td>
        </tr>
        <tr>
            <td class="hidden-phone" width="20%"><strong>Layanan</strong></td>
            <td class="hidden-phone">
                @foreach ( $data['generic'] as $pu )
                @if ( $data['transaksi']->layanan == $pu->id)
                {{ $pu->desc }}
                @endif
                @endforeach
            </td>
        </tr>
        <?php $i = 1; ?>
        @foreach($data['cicilan'] as $cicilan)
        <tr>
            <td class="hidden-phone"><strong>Cicilan {{ $i }}</strong></td>
            <td class="hidden-phone">Rp {{ $cicilan->total }}</td>
            <?php $cicil[] = $cicilan->total; ?>
        </tr>
        <?php $i++; ?> 
        @endforeach
        <tr>
            <td class="hidden-phone" width="20%"><strong>Total Pembayaran</strong></td>
            <td class="hidden-phone">
                @if( isset($cicil) )
                {{ array_sum($cicil) }}
                @endif
            </td>
        </tr>
    </tbody>
</table>
<br>
<table width="100%">
<tr>
<td width="50%"><center><br><br><br><br>{{ $data['transaksi']->jamaah->namalengkap }}</center></td>
<td><center>Depok, {{ date('d M Y') }}<br><br><br><br>{{ Auth::user()->pegawai->namalengkap }}</center></td>
</tr>
</table>