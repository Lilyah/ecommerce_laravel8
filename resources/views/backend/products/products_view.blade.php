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
                                <td>Product Name EN</td>
								<td>PRoduct Name BG</td>
								<td>QTY</td>
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
								<td>{{ $product->product_name_bg }}</td>
								<td>{{ $product->product_qty }}</td>
								<td>
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> <!-- id="delete" is needed for SweetAlert2 javascript -->
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