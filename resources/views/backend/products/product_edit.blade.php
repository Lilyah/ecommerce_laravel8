@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	  <div class="container-full">


		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">

					  <div class="row">
						<div class="col-12">
                            
                        <!-- BRAND, CATEGORY, SUBCATEGORY -->
                        <div class="row">

                            <!-- BRAND -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>Brand<span class="text-danger">*</span></h5>
							    	<div class="controls">
							    		<select name="brand_id" class="form-control">
										<option value="" selected="">Select Brand</option>

                                        @foreach ($brands as $brand)
										<option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                        @endforeach

									    </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
							    </div>
                            </div>

                            <!-- CATEGORY -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>Category<span class="text-danger">*</span></h5>
							    	<div class="controls">
							    		<select name="category_id" class="form-control">
										<option value="" selected="">Select Category</option>

                                        @foreach ($categories as $category)
          								<option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
							    	    </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
							        </div>
							    </div>
                            </div>

                            <!-- SUBCATEGORY -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>SubCategory<span class="text-danger">*</span></h5>
							    	<div class="controls">
							    		<select name="subcategory_id" class="form-control">
										<option value="" selected="">Select SubCategory</option>

                                        @foreach ($subcategories as $subcategory)
          								<option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach
							    	    </select>

                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
							        </div>
							    </div>
                            </div>

                        </div>

                        <!-- SUBSUCATEGORY, PRODUCT NAME EN, PRODUCT NAME BG -->
                        <div class="row">

                            <!-- SUBSUBCATEGORY -->   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubSubCategory<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control">
                                        <option value="" selected="">Select SubSubCategory</option>

                                        @foreach ($subsubcategories as $subsubcategory)
          								<option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $product->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcategory->subsubcategory_name_en }}</option>
                                        @endforeach
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT NAME EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" value="{{ $product->product_name_en }}"> 
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT NAME BG -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_bg" class="form-control" value="{{ $product->product_name_bg }}"> 
                                        @error('product_name_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- PRODUCT CODE, PRODUCT QTY, PRODUCT TAGS EN -->
                        <div class="row">

                            <!-- PRODUCT CODE -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}"> 
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT QTY -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product QTY <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" value="{{ $product->product_qty }}"> 
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT TAGS EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" value="{{ $product->product_tags_en }}" data-role="tagsinput" placeholder="add tags" > 
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- PRODUCT TAGS BG, PRODUCT SIZE EN, PRODUCT SIZE BG -->
                        <div class="row">

                            <!-- PRODUCT TAGS BG -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_bg" class="form-control" value="{{ $product->product_name_bg }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_tags_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SIZE EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SIZE BG -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_bg" class="form-control" value="{{ $product->product_size_bg }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_size_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- PRODUCT COLOR EN, PRODUCT COLOR BG -->
                        <div class="row">

                            <!-- PRODUCT COLOR EN -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT COLOR BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_bg" class="form-control" value="{{ $product->product_color_bg }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_color_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- PRODUCT SELLING PRICE, PRODUCT DISCOUNT PRICE, PRODUCTD THUMBNAIL, PRODUCT MULTIIMAGE -->
                        <div class="row">

                            <!-- PRODUCT SELLING PRICE -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}"> 
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT DISCOUNT PRICE -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Discount Price</h5>
                                    <div class="controls">
                                        <input type="number" name="discount_price" class="form-control" value="{{ $product->discount_price }}"> 
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- PRODUCT SHORT DESCRIPTION EN, PRODUCT SHORT DESCRIPTION BG-->
                        <div class="row">

                            <!-- PRODUCT SHORT DESCRIPTION EN -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
									    <textarea name="short_descp_en" class="form-control">{{ $product->short_descp_en }}</textarea>
                                        @error('short_descp_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SHORT DESCRIPTION BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
									<textarea name="short_descp_bg" class="form-control">{{ $product->short_descp_bg }}</textarea>
                                        @error('short_descp_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PRODUCT LONG DESCRIPTION EN, PRODUCT LONG DESCRIPTION BG-->
                        <div class="row">

                            <!-- PRODUCT LONG DESCRIPTION EN -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
									    <textarea id="editor1" rows="10" cols="80" name="long_descp_en">{!! $product->long_descp_en !!}</textarea>
                                        @error('long_descp_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>
                            </div>

                            <!-- PRODUCT LONG DESCRIPTION BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description BG <span class="text-danger">*</span></h5>
                                    <div class="controls">
									<textarea id="editor2" rows="10" cols="80" name="long_descp_bg">{!! $product->long_descp_bg !!}"</textarea>
                                        @error('long_descp_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


					    </div><!-- .col-12 -->


					  </div><!-- .row -->

                      <hr> 



						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" value="1" name="hot_deals" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" value="1" name="featured" {{ $product->featured == 1 ? 'checked' : '' }}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" value="{{ $product->special_offer }}" name="special_offer" {{ $product->special_offer == 1 ? 'checked' : '' }}>
											<label for="checkbox_4">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" value="{{ $product->special_deals }}" name="special_deals" {{ $product->special_deals == 1 ? 'checked' : '' }}>
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>

                        <div class="text-xs-right">
					    	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
					    </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->


        <!------------------- Multiple Image ----------------->
        <section class="content">

            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
			            	<div class="box bt-3 border-info">
			            	    <div class="box-header">
			            	    	<h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
			            	    </div>

                                <form method="POST" action="{{ route('product.multiimage.update') }}" enctype="multipart/form-data" class="pt-5">
                                    @csrf
                                    <div class="row row-sm">
                                        @foreach ($multiimages as $multiimage)
                                            <div class="col-md-3">
                            
                                                <div class="card">
                                                    <img src="{{ asset($multiimage->photo_name) }}" class="card-img-top" style="height: 130px; width=280px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Image"><i class="fa fa-trash"></i></a>
                                                        </h5>
                                                        <p class="card-text">
                                                            <div class="form-group">
                                                                <level class="form-control-level">Change Image <span class="tx-danger">*</level>
                                                                <input type="file" class="form-control" name="multi_img[ {{ $multiimage->id }} ]"> <!-- passing the id of the exact image -->
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="text-xs-right">
					                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
					                </div>
                                </form>

				            </div><!--.box bt-3 border-info-->
			            </div><!--.col-md-12-->
                    </div><!-- .row -->
                </div><!-- .box-body -->
            </div><!--.box-->
        </section>


        <!------------------- Thumbnail Image ----------------->
        <section class="content">

            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box bt-3 border-info">
                                <div class="box-header">
                                    <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                                </div>

                                <form method="POST" action="{{ route('product.thumbnail.update') }}" enctype="multipart/form-data" class="pt-5">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $product->id }}"> <!-- the id of the product -->
                                    <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}"> <!-- the current thumbnail of the image -->

                                    <div class="row row-sm">
                                            <div class="col-md-3">
                            
                                                <div class="card">
                                                    <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height: 130px; width=280px">
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            <div class="form-group">
                                                                <level class="form-control-level">Change Image <span class="tx-danger">*</level>
                                                                <input type="file" class="form-control" name="product_thumbnail" onchange="mainThumbUrl(this)"> <!-- passing the id of the exact image -->
                                                                <img src="" id="mainThumb">
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                                    </div>
                                </form>

                            </div><!--.box bt-3 border-info-->
                        </div><!--.col-md-12-->
                    </div><!-- .row -->
                </div><!-- .box-body -->
            </div><!--.box-->
        </section>




	  </div>


    <!-- For displaying Subcategories when you choose a Category in the form 'Add Product'
    -- And for displaying SubSubCategories when you choose a Subcategory in the form 'Add Product' -->
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
                        $('select[name="subsubcategory_id"]').html('');
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


        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/categories/subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


    	});
    	</script>


<!-- Showing the Thumbnail immidiatly after upload -->
<script type="text/javascript">
        function mainThumbUrl(input){
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThumb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


<!-- Showing the MultipleImages immidiatly after upload -->
<script>
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80).height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>

@endsection