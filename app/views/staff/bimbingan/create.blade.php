@extends('master')

@section('content')


{{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
    <script type="text/javascript">
      var i = 0;       

      function tambah(){
        i++;
        var addNo = "<input type='hidden' name='id[]' value='"+i+"'>";
        var addNama = "<td class='hidden-phone'>"+addNo+"<input class='span12 m-wrap' type='text' name='nama_detail_bimbingan[]' required></td>";
        var addWaktu = "<td class='hidden-phone'><input class='span12 m-wrap' type='text' name='waktu_bimbingan[]' placeholder='jam:menit:detik' pattern='^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$' required></td>";
        var addTanggal = "<td class='hidden-phone'><input class='span12 m-wrap' type='date' name='tanggal_bimbingan[]'' required></td>";
        var addPembimbing = "<td class='hidden-phone'><input class='span12 m-wrap' type='text' name='nama_pembimbing[]' required></td>";
        $("#detailBimbingan tbody").append("<tr class='"+i+"'>"+addNama+""+addWaktu+""+addTanggal+""+addPembimbing+"</tr>")
      };

      function kurang() {
        if(i>0){
          $("#detailBimbingan tbody tr").remove("."+i);
          i--;
        } else {
          i = 1;
        }
      };
    </script>

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
						Bimbingan
						<small>Add Detil Bimbingan</small>
                    </h3>
                    <ul class="breadcrumb">
                      <li>
                         <i class="icon-home"></i>
                         <a href="index.html">Home</a> 
                         <i class="icon-angle-right"></i>
                     </li>
                     <li>
                         <a href="#">Bimbingan</a>
                         <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">Add Detil Bimbingan</a></li>
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

                </div>
                <div class="portlet-body">
                    {{ Form::open(array('route' => 'staff.bimbingan.store', 'class' => 'form-horizontal')) }}
                    <table class="table table-striped" id="sample_3">
                        <body>
                            <tr>
                                <td class="hidden-phone" width="20%"><strong>Nama Bimbingan</strong></td>
                                <td class="hidden-phone"><input class="span12 m-wrap" type="text" name="nama_bimbingan" required></td>
                                <td class="hidden-phone" width="20%"></td>
                                <td class="hidden-phone"></td>
                            </tr>
                            <tr>
                                <td class="hidden-phone"><strong>Tahun</strong></td>
                                <td class="hidden-phone"><input class="span12 m-wrap" type="number" name="tahun" required></td>
                                <td class="hidden-phone"></td>
                                <td class="hidden-phone"></td>
                            </tr>
                        </body>
                    </table>
                    <h3 class="page-title">
                        Detail Bimbingan
                    </h3>
                    <table class="table table-striped" id="detailBimbingan">
                        <thead>
                            <th class="hidden-phone">Nama Detail Bimbingan</th>
                            <th class="hidden-phone">Waktu Bimbingan</th>
                            <th class="hidden-phone">Tanggal Bimbingan</th>
                            <th  class="hidden-phone">Nama Pembimbing</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="hidden-phone">
                                    <input class="span12 m-wrap" type="text" name="nama_detail_bimbingan[]" required>
                                    <input type='hidden' name='id[]' value='0'>
                                </td>
                                <td class="hidden-phone"><input class="span12 m-wrap" type="text" name="waktu_bimbingan[]" placeholder="jam:menit:detik" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" required></td>
                                <td class="hidden-phone"><input class="span12 m-wrap" type="date" name="tanggal_bimbingan[]" required></td>
                                <td class="hidden-phone"><input class="span12 m-wrap" type="text" name="nama_pembimbing[]" required></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan=4>
                                    <div style="float:right">
                                        <a id="tambah" class="btn green" onclick="tambah();">+</a>
                                        <a id="kurang" class="btn black" onclick="kurang();">-</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="form-actions">
                      <input type="submit" value="Add" class="btn green"/>
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