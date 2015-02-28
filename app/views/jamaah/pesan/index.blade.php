@extends('master')

@section('content')
{{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
<script type="text/javascript">

$(document).ready(function(){

    var dt = "{{ URL::asset('/') }}";

    $("#status-jamaah").change(function(){
        var id = $("#status-jamaah").val();
        //alert(id);
        $.ajax({
            'async': false,  
            'global': false,
            'url': dt+"genericmaster/"+id,
            'dataType': "json",
            'success': function (dt) {
                $(".stat-jamaah").empty();

                var $els = $(".stat-jamaah");
                var newElements = '<h4>Rp ' + dt.value + '</h4><input type="hidden" class="statjamaah" value="'+ dt.value +'"/>';
                $els.append(newElements);
            }
        });
        getTotal ();
    });
    $("#paket").change(function(){
        var id = $("#paket").val();
        //alert(id);
        $.ajax({
            'async': false,  
            'global': false,
            'url': dt+"genericmaster/"+id,
            'dataType': "json",
            'success': function (dt) {
                $(".paket-umrah").empty();

                var $els = $(".paket-umrah");
                var newElements = '<h4>Rp ' + dt.value + '</h4><input type="hidden" class="paketumrah" value="'+ dt.value +'"/>';
                $els.append(newElements);
            }
        });
        getTotal ();
    });
    $("#kamar").change(function(){
        var id = $("#kamar").val();
        //alert(id);
        $.ajax({
            'async': false,  
            'global': false,
            'url': dt+"genericmaster/"+id,
            'dataType': "json",
            'success': function (dt) {
                $(".pilihan-kamar").empty();

                var $els = $(".pilihan-kamar");
                var newElements = '<h4>Rp ' + dt.value + '</h4><input type="hidden" class="pilihankamar" value="'+ dt.value +'"/>';
                $els.append(newElements);
            }
        });
        getTotal ();
    });

});

function getTotal () {
    var statjamaah = parseInt($(".statjamaah").val());
    var paketumrah = parseInt($(".paketumrah").val());
    var pilihankamar = parseInt($(".pilihankamar").val());

    var jum = statjamaah + paketumrah + pilihankamar;
    var $els = $(".total");
    $els.empty();
    var newElements = '<input type="text" class="span12 m-wrap" id="total" name="total" value="'+ jum +'" readonly/>';
    $els.append(newElements);
}

</script>

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
                        Pesan Layanan
                        <small>{{ $data['layanan'] }}</small>
                    </h3>
                </div>
                <div class="portlet-body">
                    @if($data['cek-pelunasan'] < 1)
                    {{ Form::open(array('route' => 'jamaah.pesan.store', 'class' => 'form-vertical')) }}
                    <table class="table table-striped" id="sample_3">
                        <tbody>
                            <tr>
                                <td class="hidden-phone" width="20%"><strong>Tahun Keberangkatan</strong></td>
                                <td class="hidden-phone">
                                    <input class="span12 m-wrap" type="text" value="" name="tahun" required>
                                    <input type="hidden" value="{{ $data['layanan'] }}" name="pilihan-ibadah" required/>
                                </td>
                                <td class="hidden-phone" width="20%"></td>
                                <td class="hidden-phone"></td>
                            </tr>
                            <tr>
                                <td class="hidden-phone"><strong>Status Jamaah</strong></td>
                                <td class="hidden-phone">
                                   <select id="status-jamaah" class="span12 m-wrap" tabindex="1" name="status-jamaah">
                                        <option SELECTED>-- Pilih Status Jamaah --</option>
                                        @foreach( $data['status_jamaah'] as $stat )
                                        <option value="{{$stat->id}}">{{$stat->desc}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="hidden-phone"><div class="stat-jamaah"><input type="hidden" class="statjamaah" value="0"/></div></td>
                                <td class="hidden-phone"></td>
                            </tr>
                            <tr>
                                <td class="hidden-phone"><strong>Paket</strong></td>
                                <td class="hidden-phone">
                                    <select id="paket" class="span12 m-wrap" tabindex="1" name="paket">
                                        <option SELECTED>-- Pilih Paket Umrah --</option>
                                        @foreach( $data['paket_umrah'] as $paket )
                                        <option value="{{$paket->id}}">{{$paket->desc}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="hidden-phone"><div class="paket-umrah"><input type="hidden" class="paketumrah" value="0"/></div></td>
                                <td class="hidden-phone"></td>
                            </tr>
                            <tr>
                                <td class="hidden-phone"><strong>Kamar</strong></td>
                                <td class="hidden-phone">
                                    <select id="kamar" class="span12 m-wrap" tabindex="1" name="kamar">
                                        <option SELECTED>-- Pilih Kamar --</option>
                                        @foreach( $data['kamar'] as $kamar )
                                        <option value="{{$kamar->id}}">{{$kamar->desc}}</option>
                                        @endforeach
                                    </select>  
                                </td>
                                <td class="hidden-phone"><div class="pilihan-kamar"><input type="hidden" class="pilihankamar" value="0"/></div></td>
                                <td class="hidden-phone"></td>
                            </tr>
                            <tr>
                                <td class="hidden-phone"><strong>Total Biaya</strong></td>
                                <td class="hidden-phone"><div class="total"></div></td>
                                <td class="hidden-phone"></td>
                                <td class="hidden-phone"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-actions">
                      <input type="submit" value="Pesan" class="btn green"/>
                      <button type="button" class="btn">Cancel</button>
                    </div>
                    {{ Form::close() }}
                    @else
                        <h2>Maaf, anda belum melunasi transaksi sebelumnya. Silahkan lakukan pembayaran</h2>
                        <a href="{{ URL::asset('jamaah/konfirmasi') }}" class="btn green big">Konfirmasi Pembayaran <i class="m-icon-big-swapright m-icon-white"></i></a>
                    @endif
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