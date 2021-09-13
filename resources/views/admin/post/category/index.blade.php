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
									<li class="breadcrumb-item active">Category</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->


                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" href="#add_category_modal">Add New Category</a>
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Categories</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Slug</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Doe</td>
													<td>john@example.com</td>
													<td>john@example.com</td>
													<td>
                                                        <a class="btn btn-sm btn-info" href="">View</a>
                                                        <a class="btn btn-sm btn-warning" href="">Edit</a>
                                                        <a class="btn btn-sm btn-danger" href="">Danger</a>
                                                    </td>
												</tr>

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

        <div id="add_category_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Add New Category</h2>
                        <hr>
                        <form action="">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control">
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
