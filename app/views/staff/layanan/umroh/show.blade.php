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
                        <li><a href="#">Detail Layanan Umroh</a></li>
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
                                Detail Layanan Umroh
                                <small>{{ $data['layanan']->jamaah->namalengkap }}</small>
                            </h3>
                        </div>
                        <div class="portlet-body"><table class="table table-striped" id="sample_3">
                                <body>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>No KTP</strong></td>
                                        <td class="hidden-phone">{{ $data['layanan']->jamaah->no_ktp }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Nama Lengkap</strong></td>
                                        <td class="hidden-phone">{{ $data['layanan']->jamaah->namalengkap }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Alamat</strong></td>
                                        <td class="hidden-phone">{{ $data['layanan']->jamaah->alamat }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Tahun Keberangkatan</strong></td>
                                        <td class="hidden-phone">{{ $data['layanan']->tahun_keberangkatan }}</td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="20%"><strong>Bulan Keberangkatan</strong></td>
                                        <td class="hidden-phone">{{ $data['layanan']->bulan_keberangkatan }}</td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Paket Umroh</strong></td>
                                        <td class="hidden-phone">
                                            @foreach( $data['generic'] as $generic )
                                                @if( $generic->id == $data['layanan']->paket )
                                                    {{ $generic->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone"><strong>Kamar</strong></td>
                                        <td class="hidden-phone">
                                            @foreach( $data['generic'] as $generic )
                                                @if( $generic->id == $data['layanan']->kamar )
                                                    {{ $generic->desc }}
                                                    <?php break; ?>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="hidden-phone"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                </body>
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