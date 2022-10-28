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
					<form>

					  <div class="row">
						<div class="col-12">
                            
                        <!-- BRAND, CATEGORY, SUBCATEGORY -->
                        <div class="row">

                            <!-- BRAND -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>Brand</h5>
							    	<div class="controls">
                                    <input disabled type="text" name="brand_id"" class="form-control" value="{{ $brand->brand_name_en }}"> 
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
							    </div>
                            </div>

                            <!-- CATEGORY -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>Category</h5>
							    	<div class="controls">
                                    <input disabled type="text" name="category_id" class="form-control" value="{{ $category->category_name_en }}"> 
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
							        </div>
							    </div>
                            </div>

                            <!-- SUBCATEGORY -->
                            <div class="col-md-4">
                                <div class="form-group">
							    	<h5>SubCategory</h5>
							    	<div class="controls">
                                    <input disabled type="text" name="subcategory_id"" class="form-control" value="{{ $subcategory->subcategory_name_en }}"> 
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
                                    <h5>SubSubCategory</h5>
                                    <div class="controls">
                                    <input disabled type="text" name="subsubcategory_id"" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}"> 
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT NAME EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name EN</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_name_en" class="form-control" value="{{ $product->product_name_en }}"> 
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT NAME BG -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name BG</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_name_bg" class="form-control" value="{{ $product->product_name_bg }}"> 
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
                                    <h5>Product Code</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_code" class="form-control" value="{{ $product->product_code }}"> 
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT QTY -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product QTY</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_qty" class="form-control" value="{{ $product->product_qty }}"> 
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT TAGS EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags EN</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_tags_en" class="form-control" value="{{ $product->product_tags_en }}" data-role="tagsinput" placeholder="add tags" > 
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
                                    <h5>Product Tags BG</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_tags_bg" class="form-control" value="{{ $product->product_name_bg }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_tags_bg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SIZE EN -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size EN</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SIZE BG -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size BG</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_size_bg" class="form-control" value="{{ $product->product_size_bg }}" data-role="tagsinput" placeholder="add tags"> 
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
                                    <h5>Product Color EN</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" placeholder="add tags"> 
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PRODUCT COLOR BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color BG</h5>
                                    <div class="controls">
                                        <input disabled type="text" name="product_color_bg" class="form-control" value="{{ $product->product_color_bg }}" data-role="tagsinput" placeholder="add tags"> 
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
                                    <h5>Product Selling Price</h5>
                                    <div class="controls">
                                        <input disabled type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}"> 
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
                                        <input disabled type="number" name="discount_price" class="form-control" value="{{ $product->discount_price }}"> 
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
                                    <h5>Short Description EN</h5>
                                    <div class="controls">
									    <textarea disabled name="short_descp_en" class="form-control">{{ $product->short_descp_en }}</textarea>
                                        @error('short_descp_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>
                            </div>

                            <!-- PRODUCT SHORT DESCRIPTION BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description BG</h5>
                                    <div class="controls">
									<textarea disabled name="short_descp_bg" class="form-control">{{ $product->short_descp_bg }}</textarea>
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
                                    <h5>Long Description EN</h5>
                                    <div class="controls">
									    <textarea disabled id="editor1" rows="10" cols="80" name="long_descp_en">{!! $product->long_descp_en !!}</textarea>
                                        @error('long_descp_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
								    </div>
                                </div>
                            </div>

                            <!-- PRODUCT LONG DESCRIPTION BG -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description BG</h5>
                                    <div class="controls">
									<textarea disabled id="editor2" rows="10" cols="80" name="long_descp_bg">{!! $product->long_descp_bg !!}"</textarea>
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
											<input disabled type="checkbox" id="checkbox_2" value="1" name="hot_deals" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input disabled type="checkbox" id="checkbox_3" value="1" name="featured" {{ $product->featured == 1 ? 'checked' : '' }}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input disabled type="checkbox" id="checkbox_4" value="{{ $product->special_offer }}" name="special_offer" {{ $product->special_offer == 1 ? 'checked' : '' }}>
											<label for="checkbox_4">Special Offer</label>
										</fieldset>
										<fieldset>
											<input disabled type="checkbox" id="checkbox_5" value="{{ $product->special_deals }}" name="special_deals" {{ $product->special_deals == 1 ? 'checked' : '' }}>
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
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

                                <form enctype="multipart/form-data" class="pt-5">
                                    <div class="row row-sm">
                                        @foreach ($multiimages as $multiimage)
                                            <div class="col-md-3">
                            
                                                <div class="card">
                                                    <img src="{{ asset($multiimage->photo_name) }}" class="card-img-top" style="height: 130px; width=280px">
                                                </div>

                                            </div>
                                        @endforeach
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

                                <form enctype="multipart/form-data" class="pt-5">

                                    <div class="row row-sm">
                                            <div class="col-md-3">
                            
                                                <div class="card">
                                                    <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height: 130px; width=280px">
                                                </div>

                                            </div>
                                    </div>
                                </form>

                            </div><!--.box bt-3 border-info-->
                        </div><!--.col-md-12-->
                    </div><!-- .row -->
                </div><!-- .box-body -->
            </div><!--.box-->
        </section>




	  </div>


@endsection