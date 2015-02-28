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
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <thead>
                                    <tr>
                                        <th class="hidden-phone" width='5%'>No.</th>
                                        <th class="hidden-phone" width='25%'>Tahun Keberangkatan</th>
                                        <th class="hidden-phone" width='25%'>Layanan</th>
                                        <th class="hidden-phone" width='25%'>No. SPPH</th>
                                        <th class="hidden-phone"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data['transaksi'] as $transaksi)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td class="hidden-phone">{{ $transaksi->tahun_keberangkatan }}</td>
                                        <td class="hidden-phone">
                                                @foreach ( $data['generic'] as $pu )
                                                @if ( $transaksi->layanan == $pu->id)
                                                {{ $pu->desc }}
                                                <?php break; ?>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td class="hidden-phone">{{ $transaksi->no_spph }}</td>
                                        <td class="hidden-phone">
                                                <center>
                                                    <a href="{{ URL::asset('jamaah/konfirmasi/'.$transaksi->idtransaksi.'/edit') }}" class="btn mini green icn-only editData"><i class="icon-money icon-white"></i> Konfirmasi</a>
                                                </center>
                                            </td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
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
@stop