<div class="page-sidebar nav-collapse collapse">
		<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
		<div class="slide hide">
			<i class="icon-angle-left"></i>
		</div>
		<form class="sidebar-search" />
			<div class="input-box">
				<input type="text" class="" placeholder="Search" />
				<input type="button" class="submit" value=" " />
			</div>
		</form>
		<div class="clearfix"></div>
		<!-- END RESPONSIVE QUICK SEARCH FORM -->
		<!-- BEGIN SIDEBAR MENU -->
		<ul>
			<li>
				<a href="{{ URL::asset('/') }}">
					<i class="icon-home"></i> Home
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('keuangan/validasi-pembayaran') }}">
					<i class="icon-check"></i> Validasi Pembayaran
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('keuangan/pembayaran-bimbingan') }}">
					<i class=" icon-reorder"></i> Manage Pembayaran Bimbingan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('keuangan/laporan') }}">
					<i class="icon-money"></i> Laporan Keuangan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('keuangan/chat') }}">
					<i class="icon-comment"></i> Chat
				</a>					
			</li>
		</ul>
	<!-- END SIDEBAR MENU -->
	</div>