@extends('admin.layouts.app')

@section('main-content')
		<!-- Main Wrapper -->
        <div class="main-wrapper">

            @include('admin.layouts.header')

			@include('admin.layouts.menu')


			<!-- Page Wrapper -->
            <div class="page-wrapper">

                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Tag</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->


                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" href="#add_tag_modal">Add New Tag</a>
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Tags</h4>
								</div>
                                @include('validate')
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Slug</th>
													<th>Status</th>
													<th>Time</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($all_data as $data)
                                                    <tr>
                                                        <td>{{ $data -> id }}</td>
                                                        <td>{{ $data -> name }}</td>
                                                        <td>{{ $data -> slug }}</td>
                                                        {{-- <td>
                                                            @if ( $data -> status == true)
                                                                <span class="badge badge-success">Published</span>
                                                                @else
                                                                <span class="badge badge-danger">Unpublished</span>
                                                            @endif
                                                        </td> --}}
                                                        <td>
                                                            <div class="status-toggle">
															<input type="checkbox" {{ $data -> status == true ? 'checked="checked"' : '' }} status_id={{ $data -> id }} id="tag_status_{{ $loop -> index + 1 }}" class="check tag_check" >
															<label for="tag_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
														</div>
                                                        </td>
                                                        <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                                        <td>
                                                            {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                                            <a class="btn btn-sm btn-warning" href=""><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
                    </div>


				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

        <div id="add_tag_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Add New Tag</h2>
                        <hr>
                        <form action="{{ route('tag.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-sm" type="submit" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
