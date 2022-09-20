@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Category Edit --> 
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('category.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="form-group">
					    		<h5>Category Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}"> 
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Category Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_name_bg" class="form-control" value="{{ $category->category_name_bg }}"> 
                                    @error('category_name_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Category Icon<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}"> 
                                    <small class="text-muted">Note: Use icons from <a href="https://themify.me/themify-icons" target=”_blank”>https://themify.me/themify-icons</a></small> <!-- target=”_blank” is to open the url in new browser tab -->
                                    @error('category_icon')
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