@if( $cek = Session::get('message') )
	@if($cek == 'success-update')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('success');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Data Berhasil Diupdate</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek[0] == 'failed-update')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('error');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>{{ $cek[1] }}</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek == 'success-input')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('success');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Data Berhasil Diinput</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek[0] == 'failed-input')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('error');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>{{ $cek[1] }}</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek == 'success-delete')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('success');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Data Berhasil Dihapus</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek == 'failed-delete')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('error');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Data Gagal Dihapus</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek == 'success-register')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('success');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Register Berhasil</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek == 'failed-register')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('error');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>Register Gagal. Username, Email, atau No. KTP Sudah Ada!</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@elseif($cek[0] == 'failed-login')
		<script type="text/javascript">
			$(document).ready(function() {
				var success = generate('error');
				setTimeout(function() {
					$.noty.setText(success.options.id, '<b>{{ $cek[1] }}</b>'); // same as information.setType('warning')
				}, 500);
				setTimeout(function() {
					$.noty.closeAll();
				}, 2000);
			});
		</script>
	@endif

@endif