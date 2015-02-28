@extends('master')

@section('content')


{{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
<script type="text/javascript">
    
    $(document).ready(function() { 
        $('#sample_3').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "oLanguage": {
                "sLengthMenu": "_MENU_ per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': true,
                'aTargets': [0]
            }]
        });
        jQuery('#sample_3 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });
        $("#simpan-data").click(function() {  
            alert('sukses');  
        }); 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "{{ URL::asset('staff/passport/delete') }}/"+i;    
            $(location).attr('href',url);
        });  
    });

    function detailAction(data){
        alert(data);    
    } 
    function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
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
						Cek Kesehatan
						<small>Add Jamaah</small>
                    </h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Cek Kesehatan</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Add Jamaah</a></li>
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
                {{ Form::open(array('url' => 'staff/cek-kesehatan-jamaah', 'files'=> 'true', 'class' => 'form-horizontal')) }}
                <input type="hidden" name="idcekkesehatan" value="{{ $data['idcekkesehatan'] }}">
                <table class="table table-striped" id="sample_3">
                    <thead>
                        <tr>
                        	<th class="hidden-phone" width='1%'><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                            <th class="hidden-phone" width='10%'>No. KTP</th>
                            <th class="hidden-phone" width='80%'>Nama Jamaah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($data['jamaah'] as $jamaah)
                        <tr>
                        	<td>
                                <input type="hidden" name="idtransaksi[{{ $i }}]" value="{{ $jamaah->idtransaksi }}">
                                <input type="checkbox" class="checkboxes" name="urut[ {{ $i }} ]" value="{{ $i }}" /></td>
                            <td class="hidden-phone">{{ $jamaah->no_ktp }}</td>
                            <td class="hidden-phone">{{ $jamaah->namalengkap }}</td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn green">Add Jamaah</button>
                <a href="javascript:history.back()" class="btn">Back</a>
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