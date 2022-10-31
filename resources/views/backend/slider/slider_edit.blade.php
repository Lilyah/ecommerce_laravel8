@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Edit Slider --> 
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">

                            <div class="form-group">
					    		<h5>Title EN</h5>
					    		<div class="controls">
					    		    <input type="text" name="title_en" class="form-control" value="{{ $slider->title_en }}"> 
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Title BG</h5>
					    		<div class="controls">
					    		    <input type="text" name="title_bg" class="form-control" value="{{ $slider->title_bg }}"> 
                                    @error('title_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                                <div class="form-group">
                                    <h5>Description EN</h5>
                                    <div class="controls">
									    <textarea name="description_en" class="form-control">{{ $slider->description_en }}</textarea>
                                        @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Description BG</h5>
                                    <div class="controls">
									    <textarea name="description_bg" class="form-control">{{ $slider->description_bg }}</textarea>
                                        @error('description_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>

                            <div class="form-group">
					    		<h5>Slider Image<span class="text-danger">*</span></h5>
                                <img src="{{ asset($slider->slider_image) }}" class="mb-5" style="width: 170px; height: 100px;">
					    		<div class="controls">
                                    <input type="file" name="slider_image" class="form-control" id="image"> 
                                    @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="text-xs-right">
					    	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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