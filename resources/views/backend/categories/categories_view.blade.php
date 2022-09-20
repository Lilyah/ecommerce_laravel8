@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Categories List Table --> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Categories List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <td>Category EN</td>
								<td>Category BG</td>
								<td>Icon</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($categories as $category)
							<tr>
                                <td>
                                    <span>
                                        <i class="{{ $category->category_icon }}"></i>
                                    </span>
                                </td>
								<td>{{ $category->category_name_en }}</td>
								<td>{{ $category->category_name_bg }}</td>
								<td>
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('category.delete',$category->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
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

            <!-- Add Category --> 
			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf

                            <div class="form-group">
					    		<h5>Category Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_name_en" class="form-control" value="{{ old('category_name_en') }}"> 
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Category Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_name_bg" class="form-control" value="{{ old('category_name_bg') }}"> 
                                    @error('category_name_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Category Icon<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="category_icon" class="form-control" value="{{ old('category_icon') }}"> 
                                    <small class="text-muted">Note: Use icons from <a href="https://themify.me/themify-icons" target=”_blank”>https://themify.me/themify-icons</a></small> <!-- target=”_blank” is to open the url in new browser tab -->
                                    @error('category_icon')
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