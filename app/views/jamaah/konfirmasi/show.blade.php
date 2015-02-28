@extends('master')

@section('content')
<div class="page-container row-fluid" style="background:#fff; min-height:800px">
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<!-- <div class="page-content"> -->
	<div class="container">
		<!-- BEGIN PAGE HEADER-->
		@include('jamaah.header')
		<div class="row-fluid">
			<div class="span8">	

			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
                    <div class="portlet">
                        <div class="portlet-title">
                            <h3 class="page-title">
                                Konfirmasi Pembayaran
                                <small></small>
                                @if( $data['transaksi']->status == 32 )
                                    &nbsp; <a href="#myModal1" role="button" class="btn green big" data-toggle="modal" style="float:right"><i class="icon-plus-sign"></i> Konfirmasi Pembayaran Cicilan</a> 
                                @endif
                                <a href="{{ URL::asset('jamaah/konfirmasi/cetak') }}" class="btn green big" style="float:right; margin-right:5px;"><i class="icon-print"></i> Cetak Pembayaran</a>
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td width="30%"class="hidden-phone"><strong>Total Biaya</strong></td>
                                        <td width="30%"class="hidden-phone"></td>
                                        <td width="20%" class="hidden-phone"></td>
                                        <td width="20%" class="hidden-phone">Rp {{ $data['transaksi']->total_biaya }}</td>
                                    </tr>
                                    <?php $i = 1; ?>
                                    @foreach($data['cicilan'] as $cicilan)
                                        <tr>
                                            <td class="hidden-phone"></td>
                                            <td class="hidden-phone"><strong>Cicilan {{ $i }}</strong></td>
                                            <td class="hidden-phone">Rp {{ $cicilan->total }}</td>
                                            <td class="hidden-phone"></td>
                                            <?php $cicil[] = $cicilan->total; ?>
                                        </tr>
                                    <?php $i++; ?> 
                                    @endforeach
                                    <tr>
                                        <td class="hidden-phone"><strong>Total Cicilan</strong></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone">Rp 
                                            @if ( count($data['cicilan']) > 0 )
                                                {{ array_sum($cicil) }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Sisa Cicilan</strong></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone">Rp 
                                            @if ( count($data['cicilan']) > 0 )
                                                {{ ($data['transaksi']->total_biaya) -  (array_sum($cicil)) }}
                                            @else
                                                {{ $data['transaksi']->total_biaya }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
        <div class="span4">
            @include('jamaah.sidebar')
        </div>

    </div>
</div>
<!-- END PAGE CONTAINER-->			
<!-- </div> -->
<!-- BEGIN PAGE -->	 	
</div>
@if ( count($data['transaksi']) > 0 )
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            {{ Form::open(array('url' => 'jamaah/konfirmasi-cicilan', 'files'=> 'true', 'enctype'=> 'multipart/form-data','class' => 'form-horizontal')) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel1">Input Cicilan</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">Tanggal Pembayaran</label>
                    <div class="controls">
                        {{ date('d M Y') }}
                        <input class="m-wrap large" type="hidden" name="idtransaksi" value="{{ $data['transaksi']->idtransaksi }}" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jumlah Cicilan</label>
                    <div class="controls">
                        @if( count($data['cicilan']) > 1 )
                            <input class="m-wrap smalls" type="number" placeholder="Jumlah Cicilan" value="{{ ($data['transaksi']->total_biaya) -  (array_sum($cicil)) }}" name="total" required readonly> 
                        @else
                            <input class="m-wrap smalls" type="number" placeholder="Jumlah Cicilan" value="" name="total" required> 
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label">Bukti Kwitansi</label>
                        <div class="controls">
                            <input type="file" name="imagefile" accept="image/gif, image/jpeg" id="i_file" required>
                            <span class="label label-important">NOTE!</span>
                            <span>Ukuran Foto Max 300 KB</span>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn green">Save</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endif
@stop