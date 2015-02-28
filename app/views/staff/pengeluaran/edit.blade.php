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
                        Pengeluaran
                        <small>Pengeluaran KBIH</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ URL::asset('/') }}">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Pengeluaran</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Edit Pengeluaran</a></li>
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
                                Edit Pengeluaran
                                <small></small>
                            </h3>
                        </div>
                        <div class="portlet-body">
                            {{ Form::model($data["pengeluaran"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('staff.keuangan.update', $data["pengeluaran"]->idpengeluaran))) }}
                            <table class="table table-striped" id="sample_3">
                                <tbody>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Tanggal</strong></td>
                                        <td class="hidden-phone">
                                            <input class="m-wrap large" type="date" value="{{ $data['pengeluaran']->tanggal }}" name="tanggal" required>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Unit</strong></td>
                                        <td class="hidden-phone">
                                            <input class="m-wrap large" type="text" value="{{ $data['pengeluaran']->unit }}" name="unit" required>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Harga Satuan</strong></td>
                                        <td class="hidden-phone">
                                            <input class="m-wrap large" type="number" value="{{ $data['pengeluaran']->harga_satuan }}" name="harga_satuan" required>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
                                        <td class="hidden-phone"></td>
                                    </tr>
                                    <tr>
                                        <td class="hidden-phone" width="25%"><strong>Volume</strong></td>
                                        <td class="hidden-phone">
                                            <input class="m-wrap large" type="number" value="{{ $data['pengeluaran']->volume }}" name="volume" required>
                                        </td>
                                        <td class="hidden-phone" width="20%"></td>
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