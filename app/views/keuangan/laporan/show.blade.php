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
<h3>Pemasukan</h3>
<table class="laporan" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone">No.</th>
            <th class="hidden-phone">Unit</th>
            <th class="hidden-phone">Harga Satuan</th>
            <th class="hidden-phone">Volume</th>
            <th class="hidden-phone">Harga Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach( $data['pemasukan'] as $pemasukan)
        <tr>
            <td class="hidden-phone">{{ $i }}</td>
            <td class="hidden-phone" width="20%">{{ $pemasukan->layanan }}</td>
            <td class="hidden-phone">{{ $pemasukan->satuan }}</td>
            <td class="hidden-phone">{{ $pemasukan->qty }}</td>
            <td class="hidden-phone">{{ $pemasukan->total }}</td>
        </tr>
        <?php 
        $overallpemasukan[] = $pemasukan->total;
        $i++; 
        ?>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <td class="hidden-phone"></td>
        <td class="hidden-phone" colspan=3><strong>Total</strong></td>
        <td class="hidden-phone">{{ array_sum($overallpemasukan) }}</td>
        </tr>
    </tfoot>
</table>
<br>
<h3>Pengeluaran</h3>
<table class="laporan" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone">No.</th>
            <th class="hidden-phone">Unit</th>
            <th class="hidden-phone">Harga Satuan</th>
            <th class="hidden-phone">Volume</th>
            <th class="hidden-phone">Harga Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach( $data['pengeluaran'] as $pengeluaran)
        <tr>
            <td class="hidden-phone">{{ $i }}</td>
            <td class="hidden-phone" width="20%">{{ $pengeluaran->unit }}</td>
            <td class="hidden-phone">{{ $pengeluaran->harga_satuan }}</td>
            <td class="hidden-phone">{{ $pengeluaran->volume }}</td>
            <td class="hidden-phone">{{ $pengeluaran->harga_total }}</td>
        </tr>
        <?php 
        $overallpengeluaran[] = $pengeluaran->harga_total;
        $i++; 
        ?>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <td class="hidden-phone"></td>
        <td class="hidden-phone" colspan=3><strong>Total</strong></td>
        <td class="hidden-phone">{{ array_sum($overallpengeluaran) }}</td>
        </tr>
    </tfoot>
</table>
<br>
<h3>Total</h3>
<table class="laporan" width="100%">
    <thead>
        <tr>
            <th class="hidden-phone">No.</th>
            <th class="hidden-phone">Unit</th>
            <th class="hidden-phone">Harga Satuan</th>
            <th class="hidden-phone">Volume</th>
            <th class="hidden-phone">Harga Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="hidden-phone">1</td>
            <td class="hidden-phone" width="20%">Pemasukan</td>
            <td class="hidden-phone">-</td>
            <td class="hidden-phone">-</td>
            <td class="hidden-phone">{{ array_sum($overallpemasukan) }}</td>
        </tr>
        <tr>
            <td class="hidden-phone">2</td>
            <td class="hidden-phone" width="20%">Pengeluaran</td>
            <td class="hidden-phone">-</td>
            <td class="hidden-phone">-</td>
            <td class="hidden-phone">{{ array_sum($overallpengeluaran) }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
        <td class="hidden-phone"></td>
        <td class="hidden-phone" colspan=3><strong>Total</strong></td>
        <td class="hidden-phone">{{ array_sum($overallpemasukan) - array_sum($overallpengeluaran) }}</td>
        </tr>
    </tfoot>
</table>