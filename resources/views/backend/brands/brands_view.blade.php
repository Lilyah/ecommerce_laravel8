@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Brands List Table --> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brands List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <td>Brand EN</td>
								<td>Brand BG</td>
								<td>Image</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($brands as $brand)
							<tr>
								<td>{{ $brand->brand_name_en }}</td>
								<td>{{ $brand->brand_name_bg }}</td>
								<td><img src="{{ asset($brand->brand_image) }}" style="width: 70px; height: 40px;"></td>
								<td>
                                    <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('brand.delete',$brand->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
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

            <!-- Add Brand --> 
			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
					    		<h5>Brand Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="brand_name_en" class="form-control" value="{{ old('brand_name_en') }}"> 
                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Brand Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="brand_name_bg" class="form-control" value="{{ old('brand_name_bg') }}"> 
                                    @error('brand_name_bg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>Brand Image<span class="text-danger">*</span></h5>
					    		<div class="controls">
                                    <input type="file" name="brand_image" class="form-control" id="image"> 
                                    @error('brand_image')
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