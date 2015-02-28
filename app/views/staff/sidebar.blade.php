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
			<li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-bookmark-empty"></i> Informasi
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="{{ URL::asset('staff/informasi/1') }}">Profil</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/7') }}">Persyaratan & Ketentuan Haji</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/6') }}">Fasilitas Pelayanan Haji</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/8') }}">Persyaratan & Ketentuan Umroh</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/9') }}">Fasilitas Pelayanan Umroh</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/3') }}">Galeri</a></li>
                  <li><a class="" href="{{ URL::asset('staff/informasi/2') }}">Contact</a></li>
               </ul>
            </li>
			<li>
				<a href="{{ URL::asset('staff/jamaah') }}">
					<i class="icon-group"></i> Manage Data Jamaah
				</a>					
			</li>
			<li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-folder-open"></i> Layanan
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="{{ URL::asset('staff/haji') }}">Layanan Haji</a></li>
                  <li><a class="" href="{{ URL::asset('staff/umroh') }}">Layanan Umroh</a></li>
               </ul>
            </li>
			<li>
				<a href="{{ URL::asset('staff/cek-kesehatan') }}">
					<i class="icon-plus"></i> Manage Cek Kesehatan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('staff/bimbingan') }}">
					<i class="icon-bullhorn"></i> Manage Layanan Bimbingan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('staff/pembayaran') }}">
					<i class="icon-credit-card"></i> Manage Pembayaran Bimbingan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('staff/passport') }}">
					<i class="icon-book"></i> Manage Pembuatan Passport
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('staff/keuangan') }}">
					<i class="icon-money"></i> Laporan Keuangan
				</a>					
			</li>
			<li>
				<a href="{{ URL::asset('staff/chat') }}">
					<i class="icon-comment"></i> Chat
				</a>					
			</li>
		</ul>
	<!-- END SIDEBAR MENU -->
	</div>