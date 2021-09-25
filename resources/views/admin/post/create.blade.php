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
									<li class="breadcrumb-item active">Add New Post</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->


                    <div class="row">
                        <div class="col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Add New Post</h4>
								</div>
								<div class="card-body">
									<form action="#">

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Post Format</label>
											<div class="col-lg-9">
												<select class="form-control" name="" id="post_format">
                                                    <option value="">-select-</option>
                                                    <option value="Image">Image</option>
                                                    <option value="Gallery">Gallery</option>
                                                    <option value="Video">Video</option>
                                                    <option value="Audio">Audio</option>
                                                </select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Post Title</label>
											<div class="col-lg-9">
												<input type="text" class="form-control">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-md-3">Category</label>
											<div class="col-md-9">
                                                @foreach ( $all_cat as $cat)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="{{ $cat -> id }}" name="cat[]"> {{ $cat -> name }}
                                                        </label>
                                                    </div>
                                                @endforeach
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Post Tags</label>
											<div class="col-lg-9">
												<select class="post_tag w-100" name="tag[]" multiple="multiple">
                                                    @foreach ($all_tag as $tag)
                                                        <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
                                                    @endforeach
                                                </select>
											</div>
										</div>

                                        <div class="post-image">
                                            <div class="form-group row ">
                                                <label class="col-lg-3 col-form-label">Post Image</label>
                                                <div class="col-lg-9">
                                                    <img style="width: 400px; display:block" class="post_img_load" src="" alt="">
                                                    <label for="post_img_select"><img  style="width: 100px; cursor: pointer;" src="{{ URL::to('admin/assets/img/img.png') }}" alt=""></label>
                                                    <input style="display: none;" type="file" id="post_img_select">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="post-gallery">
                                            <div class="form-group row ">
                                                <label class="col-lg-3 col-form-label">Post Gallery Image</label>
                                                <div class="col-lg-9">
                                                    <label for="post_img_select_gallery"><img  style="width: 100px; cursor: pointer;" src="{{ URL::to('admin/assets/img/img.png') }}" alt=""></label>
                                                    <input style="display: none;" name="post_gallery[]" type="file" id="post_img_select_gallery" multiple>
                                                    <div class="post-gallery-image"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="post-video">
                                            <div class="form-group row ">
                                                <label class="col-lg-3 col-form-label">Post Video Link</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="post-audio">
                                            <div class="form-group row ">
                                                <label class="col-lg-3 col-form-label">Post Audio Link</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Content</label>
											<div class="col-lg-9">
												<textarea name="" id="post_editor"></textarea>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
                    </div>


				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

@endsection
