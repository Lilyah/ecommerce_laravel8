<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="eCommerce">
<meta name="robots" content="all">

  <!-- Favicon -->
  <link rel="icon" href="{{ url('frontend/favicon/favicon.png') }}">


<title>@yield('page_title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/css-custom.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/lightbox.css') }}">


<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- National Flags -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- TOASTR NOTIFICATIONS CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="cnt-home">

<!-- HEADER -->
@include('frontend.body.header')

<!-- CONTENT -->
@yield('content')

<!-- FOOTER -->
@include('frontend.body.footer')


<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

<!-- TOASTR NOTIFICATIONS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
    case 'info':
      toastr.info("{{ Session::get('message') }}");
      break;
    case 'success':
      toastr.success("{{ Session::get('message') }}");
      break;
    case 'warning':
      toastr.warning("{{ Session::get('message') }}");
      break;
    case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;
  }
  @endif
</script>


<!-- Add to Cart Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="{{ (session()->get('language') == 'english') ? 'pnameen' : 'pnamebg'  }}"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="..." style="max-height: 15em;" id="pimage">

            </div><!-- /.card -->

          </div><!-- /.col-md-4 -->

          <div class="col-md-4">

            <ul class="list-group">
              <li class="list-group-item">Product Price: 
                <strong class="text-danger">$<span id="pprice"></span></strong>
                <del id="oldprice">$</del>
              </li>
              <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
              <li class="list-group-item">Brand: <strong id="{{ (session()->get('language') == 'english') ? 'pbranden' : 'pbrandbg'  }}"></strong></li>
              <li class="list-group-item">Category: <strong id="{{ (session()->get('language') == 'english') ? 'pcategoryen' : 'pcategorybg'  }}"></strong></li>
              <li class="list-group-item">Stock: <strong id="pstock"></strong></li>
            </ul>

          </div><!-- /.col-md-4 -->

          <div class="col-md-4">

            <div class="form-group" id="colorArea">
                <label for="exampleFormControlSelect1">{{ (session()->get('language') == 'english') ? 'Choose Color' : 'Изберете Цвят' }}</label>
                <select class="form-control" id="exampleFormControlSelect1" name="{{ (session()->get('language') == 'english') ?  'colors_en' : 'colors_bg' }}">
                </select>
            </div><!-- /.form-group -->


            <div class="form-group" id="sizeArea">
                <label for="exampleFormControlSelect1">{{ (session()->get('language') == 'english') ? 'Choose Size' : 'Изберете Размер' }}</label>
                <select class="form-control" id="exampleFormControlSelect1" name="{{ (session()->get('language') == 'english') ? 'sizes_en' : 'sizes_bg' }}">
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label for="exampleFormControlInput1">{{ (session()->get('language') == 'english') ? 'Qty: ' : 'Брой: ' }}</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" value="1" min="1">
            </div>

            <button type="submit" class="btn btn-primary mb-2">{{ (session()->get('language') == 'english') ? 'ADD TO CART' : 'ДОБАВИ В КОЛИЧКА' }}</button>


          </div><!-- /.col-md-4 -->

        </div><!-- /.row -->


      </div><!-- /.modal-body --> 

    </div>
  </div>
</div>

<!-- For Add to Card Modal -->
<script type="text/javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  // Product View with Modal
  function productView(id){
    $.ajax({
      type: 'GET',
      url: '/product/view/modal/'+id,
      dataType: 'json',
      success: function(data){
        //console.log(data)
        $('#pnameen').text(data.product.product_name_en);
        $('#pnamebg').text(data.product.product_name_bg);
        $('#price').text(data.product.selling_price);
        $('#pcode').text(data.product.product_code);
        $('#pbranden').text(data.product.brand.brand_name_en); // 'brand' is comming from relationship in the Products model
        $('#pbrandbg').text(data.product.brand.brand_name_bg); // 'brand' is comming from relationship in the Products model
        $('#pcategoryen').text(data.product.category.category_name_en); // 'categorgy' is comming from relationship in the Products model
        $('#pcategorybg').text(data.product.category.category_name_bg); // 'categorgy' is comming from relationship in the Products model
        $('#pstock').text(data.product.product_qty);
        $('#pimage').attr('src','/'+data.product.product_thumbnail);

        // Product Price (if there is a discount_price there will be displayed both prices)
        if (data.product.discount_price == null){
          $('#pprice').text('');
          $('#oldprice').text('');
          $('#pprice').text(data.product.selling_price);
        } else {
          $('#pprice').text(data.product.discount_price);
          $('#oldprice').text(data.product.selling_price);
        }

        // Color Modal EN
        $('select[name="colors_en"]').empty();        
        $.each(data.colors_en,function(key,value){
            $('select[name="colors_en"]').append('<option value="'+value+'">'+value+'</option>')
            if (data.size == "") {
              $('#colorArea').hide();
            }else{
              $('#colorArea').show();
            }
        }) //color is from 'name=color' in select in cart modal )

        // Color Modal BG
        $('select[name="colors_bg"]').empty();        
        $.each(data.colors_bg,function(key,value){
            $('select[name="colors_bg"]').append('<option value="'+value+'">'+value+'</option>')
            if (data.size == "") {
              $('#colorArea').hide();
            }else{
              $('#colorArea').show();
            }
        }) //color is from 'name=color' in select in cart modal )


        // Size Modal EN
        $('select[name="sizes_en"]').empty();        
        $.each(data.sizes_en,function(key,value){
          $('select[name="sizes_en"]').append('<option value="'+value+'">'+value+'</option>')
          if (data.size == "") {
              $('#sizeArea').hide();
          }else{
              $('#sizeArea').show();
          }
        })

        // Size Modal BG
        $('select[name="sizes_bg"]').empty();        
        $.each(data.sizes_bg,function(key,value){
          $('select[name="sizes_bg"]').append('<option value="'+value+'">'+value+'</option>')
          if (data.size == "") {
              $('#sizeArea').hide();
          }else{
              $('#sizeArea').show();
          }
        })


      }
    })
  }

</script>

</body>
</html>