@extends('frontend.frontend_master')



@section('page_title')

{{ (session()->get('language') == 'english') ? 'Ecommerce System' : 'Онлайн Магазин'; }}

@endsection



@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('frontend.common.vertical_menu')
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
              
        <!-- ============================================== HOT DEALS ============================================== -->
        @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{ (session()->get('language') == 'english') ? 'Special Offers' : 'Специални оферти'; }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @for ($x = 0; $x <= $special_offer->count(); $x+=3)
              
              <div class="item">
                <div class="products special-product">

                @foreach ($special_offer->slice($x, 3) as $single_special_offer)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$single_special_offer->id.'/'.$single_special_offer->product_slug_en) }}"> <img src="{{ asset($single_special_offer->product_thumbnail) }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$single_special_offer->id.'/'.$single_special_offer->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $single_special_offer->product_name_en : $single_special_offer->product_name_bg; }}</a></h3>

                            <div class="rating rateit-small"></div>

                            @php
                              $amount = $single_special_offer->selling_price - $single_special_offer->discount_price;
                              $discount = ($amount / $single_special_offer->selling_price) * 100;
                            @endphp
                            
                            @if (!empty($single_special_offer->discount_price))
                              <div class="product-price"> <span class="price">${{ $single_special_offer->discount_price }}</span> <span class="price-before-discount">${{ $single_special_offer->selling_price }}</span> </div>
                            @else
                              <div class="product-price"> <span class="price">${{ $single_special_offer->selling_price }}</span></div>
                            @endif                                  
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                @endforeach
                </div>
              </div>

              @endfor

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 

        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{ (session()->get('language') == 'english') ? 'Special Deals' : 'Още...'; }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @for ($x = 0; $x <= $special_deals->count(); $x+=3)

              <div class="item">
                <div class="products special-product">

                  @foreach ($special_deals->slice($x, 3) as $single_special_deal)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$single_special_deal->id.'/'.$single_special_deal->product_slug_en) }}"> <img src="{{ asset($single_special_deal->product_thumbnail) }}"  alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ url('product/details/'.$single_special_deal->id.'/'.$single_special_deal->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $single_special_deal->product_name_en : $single_special_deal->product_name_bg; }}</a></h3>

                              <div class="rating rateit-small"></div>

                              @php
                                $amount = $single_special_deal->selling_price -  $single_special_deal->discount_price;
                                $discount = ($amount / $single_special_deal->selling_price) * 100;
                              @endphp
                            
                            @if (!empty($single_special_deal->discount_price))
                              <div class="product-price"> <span class="price">${{ $single_special_deal->discount_price }}</span> <span class="price-before-discount">${{ $single_special_deal->selling_price }}</span> </div>
                            @else
                              <div class="product-price"> <span class="price">${{ $single_special_deal->selling_price }}</span></div>
                            @endif
                            <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  @endforeach
                </div>
              </div>

            @endfor

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member2.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO | SLIDER ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

          <!-- English Language -->
          @if (session()->get('language') == 'english') 

            @foreach ($sliders as $slider)
            
              <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1"></div>
                    <div class="big-text fadeInDown-1">{{ $slider->title_en }}</div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description_en }}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div><!-- /.caption -->
                </div><!-- /.container-fluid -->
              </div><!-- /.item -->
            
            @endforeach
          
          @else  

          <!-- Bulgarian Language -->

          @foreach ($sliders as $slider)
            
            <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"></div>
                  <div class="big-text fadeInDown-1">{{ $slider->title_bg }}</div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description_bg }}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">ПАЗАРУВАЙ СЕГА</a> </div>
                </div><!-- /.caption -->
              </div><!-- /.container-fluid -->
            </div><!-- /.item -->
          
          @endforeach

        @endif
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO | SLIDER : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 


        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{ (session()->get('language') == 'english') ? 'New Products' : 'Нови Продукти' }}</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">{{ (session()->get('language') == 'english') ? 'All' : 'Всички' }}</a></li>

              @foreach ($categories as $category)
               
                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ (session()->get('language') == 'english') ? $category->category_name_en : $category->category_name_bg }}</a></li>

              @endforeach

            <!--
              <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>
            -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">

            <!-- #ALL scroll tab-->
              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                    @foreach ($products as $product)
                    
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">

                            <div class="product-image">
                              <div class="image"> 
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                              </div><!-- /.image -->
                              
                              <!--
                              /** 
                              ** TYPES OF TAGS: 
                              ** <div class="tag new"><span>new</span></div>
                              ** <div class="tag sale"><span>sale</span></div>
                              ** <div class="tag hot"><span>hot</span></div>
                              */
                              -->

                              @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount / $product->selling_price) * 100;
                              @endphp

                              @if (session()->get('language') == 'english')
                                <div class="tag {{ ( !empty($product->discount_price) ) ? 'hot' : 'new' }}"><span>{{ ( !empty($product->discount_price) ) ? round($discount).'%' : 'new' }}</span></div>
                                @else
                                <div class="tag {{ ( !empty($product->discount_price) ) ? 'hot' : 'new' }}"><span>{{ ( !empty($product->discount_price) ) ? round($discount).'%' : 'ново' }}</span></div>
                              @endif
                            </div><!-- /.product-image -->
                            
                            <div class="product-info text-left">
                              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $product->product_name_en : $product->product_name_bg }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                                @if (!empty($product->discount_price))
                                  <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>

                                @else
                                    <div class="product-price"> <span class="price">${{ $product->selling_price }}</span></div>
                                @endif
                            </div><!-- /.product-info -->
                            
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal" type="button" id="{{ $product->id }}" onclick="productView(this.id)" title="{{ (session()->get('language') == 'english') ? 'Add to cart' : 'Добави в Kоличка' }}"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">{{ (session()->get('language') == 'english') ? 'Add to cart' : 'КУПИ' }} </button>
                                  </li>
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Wishlist' : 'Добави в Любими' }}"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Compare' : 'Сравни' }}"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                </ul>
                              </div><!-- /.action --> 
                            </div><!-- /.cart --> 
                          </div><!-- /.product -->
                          
                          
                        </div><!-- /.products -->
                        
                      </div><!-- /.item -->
                      

                    @endforeach

                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div><!-- /.tab-pane -->


            <!-- #CATEGORY{{ $category->id }} scroll tab -->
              @foreach ( $categories as $category )
                
                <div class="tab-pane" id="category{{ $category->id }}">
                    <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                      @php
                        $catwiseProduct = App\Models\Products::where('category_id',$category->id)->limit(6)->orderBy('id', 'DESC')->get();
                      @endphp

                        @foreach ($catwiseProduct as $product)
                        
                          <div class="item item-carousel">
                            <div class="products">
                              <div class="product">

                                <div class="product-image">
                                  <div class="image"> 
                                    <a href="detail.html"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                  </div><!-- /.image -->
                                  @php
                                  $amount = $product->selling_price - $product->discount_price;
                                  $discount = ($amount / $product->selling_price) * 100;
                                  @endphp

                                  @if (session()->get('language') == 'english')
                                    <div class="tag {{ ( !empty($product->discount_price) ) ? 'hot' : 'new' }}"><span>{{ !empty($product->discount_price) ? round($discount).'%' : 'new' }}</span></div>
                                  @else
                                    <div class="tag {{ ( !empty($product->discount_price) ) ? 'hot' : 'new' }}"><span>{{ !empty($product->discount_price) ? round($discount).'%' : 'ново' }}</span></div>
                                  @endif
                                </div><!-- /.product-image -->
                                
                                <div class="product-info text-left">
                                  <h3 class="name"><a href="detail.html">{{ (session()->get('language') == 'english') ? $product->product_name_en : $product->product_name_bg }}</a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="description"></div>

                                    @if (!empty($product->discount_price))
                                      <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>
                                    @else
                                      <div class="product-price"> <span class="price">${{ $product->selling_price }}</span></div>
                                    @endif                               

                                </div><!-- /.product-info -->
                                
                                <div class="cart clearfix animate-effect">
                                  <div class="action">
                                    <ul class="list-unstyled">
                                      <li class="add-cart-button btn-group">
                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="{{ (session()->get('language') == 'english') ? 'Add to cart' : 'КУПИ' }}"> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">{{ (session()->get('language') == 'english') ? 'Add to cart' : 'КУПИ' }} </button>
                                      </li>
                                      <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Wishlist' : 'Добави в Любими' }}"> <i class="icon fa fa-heart"></i> </a> </li>
                                      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Compare' : 'Сравни' }}"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                  </div><!-- /.action --> 
                                </div><!-- /.cart --> 
                              </div><!-- /.product -->
                              
                              
                            </div><!-- /.products -->
                            
                          </div><!-- /.item -->
                          

                        @endforeach

                      </div>
                      <!-- /.home-owl-carousel --> 
                    </div>
                    <!-- /.product-slider --> 
                  </div>
                  <!-- /.tab-pane -->

              @endforeach

          </div><!-- /.tab-content --> 
            

        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">{{ (session()->get('language') == 'english') ? 'Featured products' : 'Специални продукти'; }}</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

          @foreach ($featured as $single_featured)

            <div class="item item-carousel">
              <div class="products">

                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$single_featured->id.'/'.$single_featured->product_slug_en) }}"><img  src="{{ asset($single_featured->product_thumbnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <!--
                    /** 
                    ** TYPES OF TAGS: 
                    ** <div class="tag new"><span>new</span></div>
                    ** <div class="tag sale"><span>sale</span></div>
                    ** <div class="tag hot"><span>hot</span></div>
                    */
                    -->

                    @php
                      $amount = $single_featured->selling_price - $single_featured->discount_price;
                      $discount = ($amount / $single_featured->selling_price) * 100;
                    @endphp

                    @if (session()->get('language') == 'english')
                      <div class="tag {{ ( !empty($single_featured->discount_price) ) ? 'hot' : 'new' }}"><span>{{ ( !empty($single_featured->discount_price) ) ? round($discount).'%' : 'new' }}</span></div>
                    @else
                      <div class="tag {{ ( !empty($single_featured->discount_price) ) ? 'hot' : 'new' }}"><span>{{ ( !empty($single_featured->discount_price) ) ? round($discount).'%' : 'ново' }}</span></div>
                    @endif

                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ url('product/details/'.$single_featured->id.'/'.$single_featured->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $single_featured->product_name_en : $single_featured->product_name_bg; }}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if (!empty($single_featured->discount_price))
                      <div class="product-price"> <span class="price">${{ $single_featured->discount_price }}</span> <span class="price-before-discount">${{ $single_featured->selling_price }}</span> </div>
                    @else
                      <div class="product-price"> <span class="price">${{ $single_featured->selling_price }}</span></div>
                    @endif      
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal" type="button" id="{{ $single_featured->id }}" onclick="productView(this.id)" title="{{ (session()->get('language') == 'english') ? 'Add to cart' : 'Добави в Kоличка'; }}"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button"></button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @endforeach

            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        <!-- ============================================== CATEGORIES ============================================== -->

          @foreach (
            ( (session()->get('language') == 'english') ? $cat_on_index_page_en : $cat_on_index_page_bg )
              as $single_cat_on_index_page)
            
            <section class="section featured-product wow fadeInUp">
              <h3 class="section-title">{{ (session()->get('language') == 'english') ? $single_cat_on_index_page->category_name_en : $single_cat_on_index_page->category_name_bg }}</h3>
              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @php
                  $catwiseProducts = App\Models\Products::where('category_id',$single_cat_on_index_page->id)->orderBy('updated_at', 'DESC')->get();
                @endphp

                @foreach ($catwiseProducts as $product)

                  <div class="item item-carousel">
                    <div class="products">

                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                        
                          <!--
                          /** 
                          ** TYPES OF TAGS: 
                          ** <div class="tag new"><span>new</span></div>
                          ** <div class="tag sale"><span>sale</span></div>
                          ** <div class="tag hot"><span>hot</span></div>
                          */
                          -->

                          @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount / $product->selling_price) * 100;
                          @endphp

                            <div class="tag {{ ( !empty($product->discount_price) ) ? 'hot' : 'new' }}"><span>{{ ( !empty($product->discount_price) ) ? round($discount).'%' : 'new' }}</span></div>

                        </div><!-- /.product-image -->
                      
                      
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $product->product_name_en : $product->product_name_bg }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if (!empty($product->discount_price))
                            <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>
                          @else
                            <div class="product-price"> <span class="price">${{ $product->selling_price }}</span></div>
                          @endif      
                          <!-- /.product-price --> 
                    
                        </div><!-- /.product-info -->
                      
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal" type="button" id="{{ $product->id }}" onclick="productView(this.id)" title="{{ (session()->get('language') == 'english') ? 'Add to cart' : 'Добави в Kоличка' }}"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">{{ (session()->get('language') == 'english') ? 'Add to cart' : 'Добави в Количка' }} </button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Wishlist' : 'Добави в Любими' }}"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="{{ (session()->get('language') == 'english') ? 'Compare' : 'Сравни' }}"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div><!-- /.action --> 
                        </div><!-- /.cart --> 
                      </div><!-- /.product --> 
                    
                    </div><!-- /.products -->
                  </div><!-- /.item -->
                
                @endforeach

                
              </div><!-- /.home-owl-carousel --> 
              
            </section><!-- /.section --> 
            

          @endforeach

        <!-- ============================================== CATEGORIES : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p20.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p21.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p22.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p23.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p24.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p25.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p27.jpg') }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post2.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post2.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p19.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p28.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p30.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p1.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p2.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p3.jpg') }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

@endsection