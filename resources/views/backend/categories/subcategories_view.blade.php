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
				  <h3 class="box-title">SubCategories List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <td>Category</td>
                                <td>SubCategory EN</td>
								<td>SubCategory BG</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($subcategories as $subcategory)
							<tr>
                                <!-- This relationship here for visualization of the name of the Category is creatied in the model SubCategories -->
								<td>{{ $subcategory['category']['category_name_en'] }}</td> 
								<td>{{ $subcategory->subcategory_name_en }}</td>
								<td>{{ $subcategory->subcategory_name_bg }}</td>
								<td>
                                    <a href="{{ route('subcategory.edit',$subcategory->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subcategory.delete',$subcategory->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
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
				  <h3 class="box-title">Add SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('subcategory.store') }}">
                            @csrf

                            <div class="form-group">
								<h5>Category<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="">Select Category</option>

                                        @foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach

									</select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

                            <div class="form-group">
					    		<h5>SubCategory Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subcategory_name_en" class="form-control" value="{{ old('subcategory_name_en') }}"> 
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>SubCategory Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subcategory_name_bg" class="form-control" value="{{ old('subcategory_name_bg') }}"> 
                                    @error('subcategory_name_bg')
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