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
									<li class="breadcrumb-item active">Post</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->


                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-sm" href="{{ route('post.create') }}">Add New Post</a>
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Posts</h4>
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
                                                        <td>{{ $loop -> index + 1 }}</td>
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
                                                                <input type="checkbox" {{ ( $data -> status == true ? 'checked="checked"' :  "") }} status_id="{{ $data -> id }}" id="cat_status_{{ $loop -> index + 1 }}" class="check cat_check" >
                                                                <label for="cat_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
                                                            </div>
                                                        </td>
                                                        <td>{{ date('F d Y', strtotime($data -> created_at)) }}</td>
                                                        <td>
                                                            {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                                            <a edit_id="{{ $data -> id }}" class="btn btn-sm btn-warning edit-cat" href=""><i class="fa fa-pencil"></i></a>
                                                            <form class="d-inline" action="{{ route('category.destroy', $data -> id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                                                            </form>

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
{{--
        <!-- start post add modal -->
        <div id="add_category_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Add New Category</h2>
                        <hr>
                        <form action="{{ route('category.store') }}" method="POST">
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
        <!-- End category add modal -->

        <!-- start category edit modal -->
        <div id="edit_category_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Edit Category</h2>
                        <hr>
                        <form action="{{ route('category.update', 1) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                                <input type="hidden" name="edit_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-sm" type="submit" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End category edit modal --> --}}
@endsection
