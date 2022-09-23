@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Categories List Table --> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">SubSubCategories List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <td>Category</td>
                                <td>SubCategory</td>
                                <td>SubSubCategory EN</td>
								<td>SubSubCategory BG</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($subsubcategories as $subsubcategory)
							<tr>
                                <!-- This relationship here for visualization of the name of the Category & Subcategory is creatied in the model SubSubCategories -->
								<td>{{ $subsubcategory['category']['category_name_en'] }}</td> 
								<td>{{ $subsubcategory['subcategory']['subcategory_name_en'] }}</td> 
								<td>{{ $subsubcategory->subsubcategory_name_en }}</td>
								<td>{{ $subsubcategory->subsubcategory_name_bg }}</td>
								<td>
                                    <a href="{{ route('subsubcategory.edit',$subsubcategory->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subsubcategory.delete',$subsubcategory->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
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

            <!-- Add SubSubCategory --> 
			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubSubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('subsubcategory.store') }}">
                            @csrf

							<!-- Category select -->
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

							<!-- SubCategory select -->
                            <div class="form-group">
								<h5>SubCategory<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="" selected="">Select SubCategory</option>
									</select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

							<!-- SubSubCategory EN name -->
                            <div class="form-group">
					    		<h5>SubSubCategory Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ old('subsubcategory_name_en') }}"> 
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

							<!-- SubSubCategory BG name -->
                            <div class="form-group">
					    		<h5>SubSubCategory Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subsubcategory_name_bg" class="form-control" value="{{ old('subsubcategory_name_bg') }}"> 
                                    @error('subsubcategory_name_bg')
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


	  <!-- For displaying Subcategories when you choose a Category in the form 'Add New SubSubCategory' -->
	  <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/categories/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    	});
    	</script>

@endsection