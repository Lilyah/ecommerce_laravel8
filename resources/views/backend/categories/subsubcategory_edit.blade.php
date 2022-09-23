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
				  <h3 class="box-title">Edit SubSubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <form method="post" action="{{ route('subsubcategory.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $subsubcategory->id }}">

							<div class="form-group">
								<h5>Category<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
										<option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

							<div class="form-group">
								<h5>SubCategory<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">

			/** 
    		* TODO: I don't like this select, because it shows all subcategories instead of only the subcategories of the corresponding category
     		*/                          @foreach ($subcategories as $subcategory)
										<option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

                            <div class="form-group">
					    		<h5>SubSubCategory Name EN<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}"> 
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
					    	</div>

                            <div class="form-group">
					    		<h5>SubSubCategory Name BG<span class="text-danger">*</span></h5>
					    		<div class="controls">
					    		    <input type="text" name="subsubcategory_name_bg" class="form-control" value="{{ $subsubcategory->subsubcategory_name_bg }}"> 
                                    @error('subsubcategory_name_bg')
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