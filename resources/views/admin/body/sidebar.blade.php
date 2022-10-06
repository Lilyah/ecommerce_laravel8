@php

// This code is for the active links. 
// wWhen a link in the url is active the btn will be colorful.

$prefix = Request::route()->getPrefix(); // taking the prefix from the route
$route = Route::current()->getName(); // taking the route name

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			    <div class="ulogo">
				    <a href="index.html">
				      <!-- logo for regular state and mobile devices -->
					    <div class="d-flex align-items-center justify-content-center">					 	
						    <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						    <h3><b>Ecommerce</b> Admin</h3>
					    </div>
				    </a>
			    </div>
        </div>
      
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">  
		  
		      <li class="{{ ($route == 'dashboard') ? 'active' : ''}}">
            <a href="{{ url('admin/dashboard') }}">
              <i data-feather="pie-chart"></i>
			        <span>Dashboard</span>
            </a>
          </li>  

		      <!-- Brands -->
          <li class="treeview {{ ($prefix == '/brands') ? 'active' : ''}}">
            <a href="#">
              <i data-feather="tag"></i>
              <span>Brands</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.brands') ? 'active' : ''}}">
                <a href="{{ route('all.brands') }}"><i class="ti-more"></i>All Brands</a>
              </li>
            </ul>
          </li> 
		  
          <!-- Categories -->
          <li class="treeview {{ ($prefix == '/categories') ? 'active' : ''}}">
            <a href="#">
              <i data-feather="grid"></i> <span>Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.categories' || $route == 'category.edit') ? 'active' : ''}}">
                <a href="{{ route('all.categories') }}"><i class="ti-more"></i>All Categories</a>
              </li>
              <li class="{{ ($route == 'all.subcategories' || $route == 'subcategory.edit') ? 'active' : ''}}">
                <a href="{{ route('all.subcategories') }}"><i class="ti-more"></i>All Subcategories</a>
              </li>
              <li class="{{ ($route == 'all.subsubcategories' || $route == 'subsubcategory.edit') ? 'active' : ''}}">
                <a href="{{ route('all.subsubcategories') }}"><i class="ti-more"></i>All SubSubcategories</a>
              </li>
            </ul>
          </li>
		
          <!-- Products -->
          <li class="treeview {{ ($prefix == '/products') ? 'active' : ''}}">
            <a href="#">
              <i data-feather="box"></i>
              <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'add.product') ? 'active' : ''}}">
                <a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a>
              </li>
              <li>
                <a href=""><i class="ti-more"></i>Manage Products</a>
              </li>
            </ul>
          </li> 		  
		 
          <li class="header nav-small-cap">User Interface</li>
		  
          <li class="treeview">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Components</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
              <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
              <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            </ul>
          </li>
		
		      <li class="treeview">
            <a href="#">
              <i data-feather="credit-card"></i>
              <span>Cards</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
			        <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			        <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			        <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		        </ul>
          </li>  
	  		  
		
        </ul>
    </section>
	
	  <div class="sidebar-footer">
		  <!-- item-->
		  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		  <!-- item-->
		  <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
	  	<!-- item-->
		  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	  </div>

    
</aside>