@extends('master')

@section('content')
<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	@include('kepalasekretariat.sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->
			<div class="row-fluid">
				<div class="span12">	
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
					<h3 class="page-title">
						Chat
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Chat</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->				
			<div class="row-fluid">
			<div class="span8">
				<div class="portlet-title">
					@if( $data['chat-with'] == null )
					<h4><i class="icon-reorder"></i>Chat Message</h4>
					@else
					<h4><i class="icon-reorder"></i>Chat With {{ ucfirst($data['chat-with']) }}</h4>
					@endif
					<div class="tools">
						
					</div>
				</div>
				<div class="portlet-body scroll-area">
					<div id="scroller-chat" class="scroller" data-height="200px" data-spy="scroll" data-always-visible="1" data-rail-visible="1">
						@if( $data['chat-with'] == null )
						<blockquote>
							<p>No Chat Activity....</p>
							<small>System App <cite title="Source Title"></cite></small>
						</blockquote>
						@else
						@if( count($data['chat']) > 0  )
						@foreach( $data['chat']->detailchat as $chats )
						<?php
						$id = Auth::user()->iduser;
						?>
						@if( $chats->to != $id )
						<blockquote>
							<p>{{ $chats->isi }}</p>
							<small>{{ $chats->waktu }} 
							</small>
						</blockquote>
						@else
						<div class="clearfix">
							<blockquote class="pull-right">
								<p>{{ $chats->isi }}</p>
								<small>{{ $chats->waktu }} 
								</small>
							</blockquote>
						</div>
						@endif
						@endforeach
						@else
						<blockquote>
							<p>No Chat Activity....</p>
							<small>System App <cite title="Source Title"></cite></small>
						</blockquote>
						@endif
						@endif
						@if( $data['chat-with'] == null )
						<form action="#">
							<div class="input-append" style="width:93%">
								<input class="m-wrap span12" value="Please select person..." type="text" disabled><button class="btn" type="button"><i class="icon-comment"></i> Chat!</button>
							</div>
						</form>
						@else
						{{ Form::model($data['chat-with'], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('kepala-sekretariat.chat.update', $data['chat-with']))) }}
						<div class="input-append" style="width:90%">
							<input class="m-wrap span12" type="text" name="chat" required>
							<button class="btn green" type="submit"><i class="icon-comment icon-white"></i> Chat!</button>
						</div>
						{{ Form::close() }}
						@endif
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="portlet-title">
					<h4><i class="icon-reorder"></i>Chat List</h4>
					<div class="tools">
						
					</div>
				</div>
				<div class="portlet-body scroll-area2">
					<div class="scroller" data-height="200px">
						<a href="#myModal1" role="button" class="btn green btn-block" data-toggle="modal"><i class="icon-comment icon-white"></i> New Chat!</a>
						@if(count($data['mychat']) > 0)
						<?php $i = 1 ?>
						@foreach ( $data['mychat'] as $mychat )
						<div style="border-bottom: solid 1px #eeeeee;">
							<table>
								<tr>
									<td width="75px">
										<img src="{{ URL::asset('images/logo.png') }}" class="img-responsive img-rounded" alt="Responsive image" width="70px">
									</td>
									<?php $id = Auth::user()->iduser; ?>
									<?php
											foreach( $mychat->detailchat as $detil ){
												if( $detil->to == $id ){
													$stat[$i][] = $detil->status;
												}else{
													$stat[$i][] = 0;
												}
											}
									?>
									@if( $mychat->user1 == $id )
									<td>
										<a href="{{ URL::asset('kepala-sekretariat/chat/'.$mychat->receiver->username) }}"><h4>{{ $mychat->receiver->username }}
											@if( array_sum($stat[$i]) > 0 )
												<span class="badge badge-important">{{ array_sum($stat[$i]) }}</span>
											@endif
										</h4>
										</a>
										<p>{{ $mychat->receiver->usertype->nama }}</p>
									</td>
									@else
									<td>
										<a href="{{ URL::asset('kepala-sekretariat/chat/'.$mychat->sender->username) }}"><h4>{{ $mychat->sender->username }}
											@if( array_sum($stat[$i]) > 0 )
												<span class="badge badge-important">{{ array_sum($stat[$i]) }}</span>
											@endif
										</h4>
										</a>
										<p>{{ $mychat->sender->usertype->nama }}</p>
									</td>
									@endif
								</tr>
							</table>
						</div>
						<?php $i++; ?>
						@endforeach
						@endif
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


<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h3 id="myModalLabel1">Chat To</h3>
	</div>
	<div class="modal-body">
		@foreach ( $data['user'] as $user )
		<div style="border-bottom: solid 1px #eeeeee;">
			<table>
				<tr>
					<td width="75px">
						<img src="{{ URL::asset('images/logo.png') }}" class="img-responsive img-rounded" alt="Responsive image" width="70px">
					</td>
					<td>
						<a href="{{ URL::asset('kepala-sekretariat/chat/'.$user->username) }}"><h4>{{ $user->username }}</h4></a>
						<p>{{ $user->nama }}</p>
					</td>
				</tr>
			</table>
		</div>
		@endforeach
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
</div>


@stop