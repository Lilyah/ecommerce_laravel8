@if (session()->get('language') == 'english') 

<!-- English Language -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head">
      <i class="icon fa fa-align-justify fa-fw"></i> Categories
    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach ($categories_all as $category)
  
          <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}"></i> {{ $category->category_name_en}}</a>
            <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
                <div class="row">

                  <!-- Access to the SubCategories Model -->
                  @php
                  $subcategories = App\Models\SubCategories::where('category_id',$category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                  @endphp

                  @foreach ($subcategories as $subcategory)
                    <div class="col-sm-12 col-md-3">
                      <h2 class="title">{{ $subcategory->subcategory_name_en }}</h2>

                      <ul class="links list-unstyled">

                        <!-- Access to the SubSubCategories Model -->
                        @php
                        $subsubcategories = App\Models\SubSubCategories::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                        @endphp

                        @foreach ($subsubcategories as $subsubcategory)
                        <li><a href="#">{{ $subsubcategory->subsubcategory_name_en}}</a></li>
                        @endforeach
                      </ul>
                    </div><!-- /.col-sm-12 -->
                  @endforeach
                </div><!-- /.row --> 
              </li><!-- /.yamm-content -->
            </ul>
          </li><!-- /.dropdown-menu --> 
          <!-- /.menu-item -->

        @endforeach
  
      </ul><!-- /.nav --> 
    </nav><!-- /.megamenu-horizontal --> 
</div><!-- /.side-menu -->

@else

<!-- Bulgarian Language -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head">
      <i class="icon fa fa-align-justify fa-fw"></i> Категории
    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach ($categories_all as $category)
  
          <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}"></i> {{ $category->category_name_bg}}</a>
            <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
                <div class="row">

                  <!-- Access to the SubCategories Model -->
                  @php
                  $subcategories = App\Models\SubCategories::where('category_id',$category->id)->orderBy('subcategory_name_bg', 'ASC')->get();
                  @endphp

                  @foreach ($subcategories as $subcategory)
                    <div class="col-sm-12 col-md-3">
                      <h2 class="title">{{ $subcategory->subcategory_name_bg }}</h2>
                      <ul class="links list-unstyled">

                        <!-- Access to the SubSubCategories Model -->
                        @php
                        $subsubcategories = App\Models\SubSubCategories::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                        @endphp

                        @foreach ($subsubcategories as $subsubcategory)
                          <li><a href="#">{{ $subsubcategory->subsubcategory_name_bg}}</a></li>
                        @endforeach
                      </ul>
                    </div><!-- /.col-sm-12 -->
                  @endforeach
                </div><!-- /.row --> 
              </li><!-- /.yamm-content -->
            </ul>
          </li><!-- /.dropdown-menu --> 
          <!-- /.menu-item -->

        @endforeach
  
      </ul><!-- /.nav --> 
    </nav><!-- /.megamenu-horizontal --> 
</div><!-- /.side-menu -->

@endif
