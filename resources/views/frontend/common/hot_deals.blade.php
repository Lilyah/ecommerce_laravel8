<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">{{ (session()->get('language') == 'english') ? 'Hot deals' : 'Горещи оферти'; }}</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

          @foreach ($hot_deals as $single_hot_deal)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <a href="{{ url('product/details/'.$single_hot_deal->id.'/'.$single_hot_deal->product_slug_en) }}"><img src="{{ asset($single_hot_deal->product_thumbnail) }}" alt=""> </div>
                  <!-- /.image -->

                  @php
                    $amount = $single_hot_deal->selling_price - $single_hot_deal->discount_price;
                    $discount = ($amount / $single_hot_deal->selling_price) * 100;
                  @endphp


                  @if (!empty($single_hot_deal->discount_price))
                      <div class="sale-offer-tag"><span>{!! round($discount).'%<br>off' !!}</span></div>
                  @endif

                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{ url('product/details/'.$single_hot_deal->id.'/'.$single_hot_deal->product_slug_en) }}">{{ (session()->get('language') == 'english') ? $single_hot_deal->product_name_en : $single_hot_deal->product_name_bg; }}</a></h3>
                  <div class="rating rateit-small"></div>

                  @if (!empty($single_hot_deal->discount_price))
                    <div class="product-price"> 
                      <span class="price">${{ $single_hot_deal->discount_price }}</span> 
                      <span class="price-before-discount">${{ $single_hot_deal->selling_price }}</span> 
                    </div>
                  @else
                    <div class="product-price"> 
                      <span class="price">${{ $single_hot_deal->selling_price }}</span>
                    </div>
                  @endif    
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>

            @endforeach

          </div>
          <!-- /.sidebar-widget --> 
        </div>