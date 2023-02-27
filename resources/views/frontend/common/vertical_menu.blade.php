<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head">
      <i class="icon fa fa-align-justify fa-fw"></i> {{ (session()->get('language') == 'english')  ? 'Categories' : 'Категории' }}
    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach ($categories_all as $category)
  
          <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}"></i> {{ (session()->get('language') == 'english') ? $category->category_name_en : $category->category_name_bg }}</a>
            <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
                <div class="row">

                  <!-- Access to the SubCategories Model -->
                  @php
                  $subcategories = App\Models\SubCategories::where('category_id',$category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                  @endphp

                  @foreach ($subcategories as $subcategory)
                    <div class="col-sm-12 col-md-3">
                      <a href="{{ url($category->category_slug_en.'/'.$subcategory->subcategory_slug_en.'/'.$subcategory->id.'/products') }}">
                        <h2 class="title">{{ (session()->get('language') == 'english') ? $subcategory->subcategory_name_en : $subcategory->subcategory_name_bg }}</h2>
                      </a>
                      <ul class="links list-unstyled">

                        <!-- Access to the SubSubCategories Model -->
                        @php
                        $subsubcategories = App\Models\SubSubCategories::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                        @endphp

                        @foreach ($subsubcategories as $subsubcategory)
                        <li><a href="{{ url($category->category_slug_en.'/'.$subcategory->subcategory_slug_en.'/'.$subsubcategory->subsubcategory_slug_en.'/'.$subsubcategory->id.'/products') }}">{{ (session()->get('language') == 'english') ? $subsubcategory->subsubcategory_name_en : $subsubcategory->subsubcategory_name_bg }}</a></li>
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

