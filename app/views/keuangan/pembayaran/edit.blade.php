@extends('master')

@section('content')

<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    @include('keuangan.sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">    
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->       
                    <h3 class="page-title">
                        Pembayaran
                        <small>Pembayaran Bimbingan</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Pembayaran</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Pembayaran Bimbingan</a></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->              
            <div class="row-fluid">
                <div class="span12">
                   <div class="portlet">
                        <div class="portlet-title">
                            <h3 class="page-title">
                                Konfirmasi Pembayaran
                                <small></small>
                            </h3>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Layanan</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $paket )
                                                @if($paket->id == $data['transaksi']->layanan)
                                                    {{ $paket->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Tahun Keberangkatan</strong></td>
                                        <td class="hidden-phone">{{ $data['transaksi']->tahun_keberangkatan }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    @if( $data['transaksi']->layanan == 37 )
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Status Jamaah</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $statjamaah )
                                                @if($statjamaah->id == $data['transaksi']->status_jamaah)
                                                    {{ $statjamaah->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Paket</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $paket )
                                                @if($paket->id == $data['transaksi']->paket)
                                                    {{ $paket->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Kamar</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $kamar )
                                                @if($kamar->id == $data['transaksi']->kamar)
                                                    {{ $kamar->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Status Pembayaran</strong></td>
                                        <td class="hidden-phone">
                                            @foreach ( $data['generic'] as $status )
                                                @if($status->id == $data['transaksi']->status)
                                                    {{ $status->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Total Biaya</strong></td>
                                        <td class="hidden-phone">Rp {{ $data['transaksi']->total_biaya }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="portlet">
                        <div class="portlet-title">
                            <h3 class="page-title">
                                Detail Cicilan
                                <small></small>
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
          </div>
          <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->            
  </div>
  <!-- BEGIN PAGE -->       
</div>
@stop