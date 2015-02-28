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
				<a href="{{ URL::asset('ketua/user') }}">
					<i class=" icon-user"></i> Manajemen User
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('ketua/validasi-jamaah') }}">
					<i class=" icon-ok-circle"></i> Validasi Jamaah
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('ketua/laporan/jamaah') }}">
					<i class="icon-group"></i> Laporan Data Jamaah
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('ketua/laporan/pembayaran') }}">
					<i class="icon-money"></i> Laporan Pembayaran
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('ketua/keuangan') }}">
					<i class=" icon-reorder"></i> Laporan Keuangan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('ketua/chat') }}">
					<i class="icon-comment"></i> Chat
				</a>					
			</li>
		</ul>
	<!-- END SIDEBAR MENU -->
	</div>