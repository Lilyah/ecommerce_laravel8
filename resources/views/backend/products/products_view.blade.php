@extends('admin.admin_master')

@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <!-- Products List Table --> 
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Products List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <td>Image</td>
                                <td>Product EN</td>
								<td>Product Price</td>
								<td>QTY</td>
								<td>Discount Price</td>
								<td>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($products as $product)
							<tr>
                                <td>
                                    <img src="{{ asset($product->product_thumbnail) }}" style="height:60px;" alt="">
                                </td>
								<td>{{ $product->product_name_en }}</td>
								<td>{{ $product->selling_price }}</td>
								<td>{{ $product->product_qty }}</td>
								<td>{{ $product->discount_price }}</td>
								<td>
									@if ($product->status == 1)
										<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Inactive</span>
									@endif
								</td>
								<td>
                                    <a href="{{ route('product.view',$product->id) }}" class="btn btn-primary" title="View"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('product.delete',$product->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->

									@if ($product->status == 1)
                                    	<a href="{{ route('product.deactivate',$product->id) }}" class="btn btn-danger" title="Deactivate"><i class="fa fa-arrow-down"></i></a>
									@else
                                    	<a href="{{ route('product.activate',$product->id) }}" class="btn btn-success" title="Activate"><i class="fa fa-arrow-up"></i></a>
									@endif


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

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

@endsection