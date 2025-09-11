@extends('theme.main')

@section('content')
<div class="container content-wrap">
	<div class="row">
		<div class="col-md-9">
			<div class="row clearfix">
				<div class="col-lg-12">
					<div class="tabs tabs-alt clearfix" id="tabs-profile">
						<div class="tab-content clearfix" id="tab-feeds">
							<h4>{{$page->name}}</h4>
							<form method="get">
								<div class="form-row">
									<div class="form-group" style="margin-right: 10px;">
										<input type="search" name="searchtxt" class="form-control" placeholder="Search Title..." value="@if(isset($_GET['searchtxt'])) {{$_GET['searchtxt']}} @endif">
									</div>
									<div class="form-group" style="margin-right: 10px;">
										<select class="form-control" name="category">
											<option value="all">All Category</option>
											@foreach($categories as $cat)
												<option @if(isset($_GET['category']) && $_GET['category'] == $cat->id) selected="selected" @endif value="{{$cat->id}}">{{$cat->title}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icon-search"></i></button>
										<a href="{{ route('member.file-download') }}" class="btn btn-secondary">Reset</a>
									</div>
								</div>
							</form>
							
							<div class="table-responsive table-striped">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Title</th>
											<th>Document No.</th>
											<th>Category</th>
											<th>File</th>
										</tr>
									</thead>
									<tbody>
										@forelse($member_files as $f)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$f->title}}</td>
											<td>{{$f->version_no}}</td>
											<td>{{$f->category}}</td>
											<td>
												@php
													$file = explode('.',$f->file_url);
													$ext  = end($file);
												@endphp
												@if($ext == 'pdf')
													@if($f->category == 'Forms')
														<a class="nav-link p-0" data-bs-toggle="dropdown" href="{{ env('APP_URL').'/storage/downloadables/'.$f->file_url}}" aria-expanded="false" target="_blank">
															<i class="icon-eye"></i>
														</a>
													@else
														<a class="nav-link p-0" data-bs-toggle="dropdown" href="{{ env('APP_URL').'/storage/downloadables/'.$f->file_url}}#toolbar=0" aria-expanded="false" target="_blank">
															<i class="icon-eye"></i>
														</a>
													@endif
												@else
													<a class="nav-link p-0" data-bs-toggle="dropdown" href="{{ env('APP_URL').'/storage/downloadables/'.$f->file_url}}" aria-expanded="false" target="_blank">
														<i class="icon-download"></i>
													</a>
												@endif
											</td>
										</tr>
										@empty
										<tr><td colspan="5" class="text-center">No records found.</td></tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="float-right">
						{{ $member_files->links('theme.layouts.pagination') }}
					</div>
				</div>
			</div>
		</div>

		<div class="w-100 line d-block d-md-none"></div>

		@include('theme.pages.member.sidebar')

	</div>
</div>
@endsection

@section('pagejs')
@endsection

