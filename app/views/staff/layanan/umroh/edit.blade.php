@extends('master')

@section('content')

<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    @include('staff.sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">    
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->       
                    <h3 class="page-title">
                        Layanan
                        <small>Layanan Umroh</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Layanan</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Edit Layanan Umroh</a></li>
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
                                Edit Layanan Umroh
                                <small></small>
                            </h3>
                        </div>
                        <div class="portlet-body">
                            {{ Form::model($data["transaksi"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('staff.umroh.update', $data["transaksi"]->idtransaksi))) }}
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Layanan</strong></td>
                                        <td class="hidden-phone">
                                            <select class="large m-wrap" tabindex="1" name="layanan" required readonly>
                                                @foreach ( $data['generic'] as $layanan )
                                                    @if($layanan->id == $data['transaksi']->layanan)
                                                        <option value="{{ $layanan->id }}" SELECTED>{{ $layanan->desc }}</option>
                                                        <?php break; ?>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Tahun Keberangkatan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="m-wrap large" type="number" value="{{ $data['transaksi']->tahun_keberangkatan }}" name="tahun_keberangkatan" required>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Bulan Keberangkatan</strong></td>
                                        <td class="hidden-phone">
                                            <select class="large m-wrap" tabindex="1" name="bulan_keberangkatan" required>
                                                <option SELECTED>-- Pilih Bulan --</option>
                                                @for($i = 1; $i<13; $i++)
                                                    @if( $i == $data['transaksi']->bulan_keberangkatan )
                                                        <option value="{{ $i }}" SELECTED>{{ $i }}</option>
                                                    @else
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Paket Umroh</strong></td>
                                        <td class="hidden-phone">
                                            <select class="large m-wrap" tabindex="1" name="paket" required>
                                                @foreach ( $data['generic'] as $paket )
                                                    @if( $paket->type == 'PAKET UMRAH' )
                                                        @if($paket->id == $data['transaksi']->paket)
                                                            <option value="{{ $paket->id }}" SELECTED>{{ $paket->desc }}</option>
                                                        @else
                                                            <option value="{{ $paket->id }}">{{ $paket->desc }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Kamar</strong></td>
                                        <td class="hidden-phone">
                                            <select class="large m-wrap" tabindex="1" name="kamar" required>
                                                @foreach ( $data['generic'] as $kamar )
                                                    @if( $kamar->type == 'KAMAR' )
                                                        @if($kamar->id == $data['transaksi']->kamar)
                                                            <option value="{{ $kamar->id }}" SELECTED>{{ $kamar->desc }}</option>
                                                        @else
                                                            <option value="{{ $kamar->id }}">{{ $kamar->desc }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
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
                            <div class="form-actions">
                              <input type="submit" value="Update" class="btn green"/>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                          {{ Form::close() }}
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