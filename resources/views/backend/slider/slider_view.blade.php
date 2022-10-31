@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Slider List Table --> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>Slider Image</td>
                                <td>Title EN</td>
								<td>Description EN</td>
								<td>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($slider as $image)
							<tr>
                                <td><img src="{{ asset($image->slider_image) }}" style="width: 70px; height: 40px;"></td>
								<td>{{ $image->title_en }}</td>
								<td>{{ $image->description_en }}</td>
								<td>
									@if ($image->status == 1)
										<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Inactive</span>
									@endif
								</td>								
                                <td>
                                    <a href="{{ route('slider.edit',$image->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
                                </td>
							</tr>
                            @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div>
			<!-- /.col -->

            <!-- Add Slider --> 
			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
					    		<h5>Slider Title EN</h5>
					    		<div class="controls">
					    		    <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}"> 
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Slider Title BG</h5>
					    		<div class="controls">
					    		    <input type="text" name="title_bg" class="form-control" value="{{ old('title_bg') }}"> 
                                    @error('title_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Description EN</h5>
					    		<div class="controls">
					    		    <input type="text" name="description_en" class="form-control" value="{{ old('description_en') }}"> 
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Description BG</h5>
					    		<div class="controls">
					    		    <input type="text" name="description_bg" class="form-control" value="{{ old('description_bg') }}"> 
                                    @error('description_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Slider Image<span class="text-danger">*</span></h5>
					    		<div class="controls">
                                    <input type="file" name="slider_image" class="form-control" id="image"> 
                                    @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="text-xs-right">
					    	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
					    </div>

                        </form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div>
			<!-- /.col -->




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

@endsection