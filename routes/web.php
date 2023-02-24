<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {return view('welcome');}); // Default Laravel Welcome one
Route::get('/', [IndexController::class, 'index']); // Custom index page

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin login
Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginform']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){ // Auth for only admins to access

    // Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // Admin Dashboard 
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    // Admin Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change_password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change_password/update', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Admin Brands
    Route::prefix('brands')->group(function(){
        Route::get('/view', [BrandsController::class, 'BrandsView'])->name('all.brands');
        Route::post('/store', [BrandsController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandsController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update', [BrandsController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandsController::class, 'BrandDelete'])->name('brand.delete');
    }); // .Route::prefix('brands')


    // Admin Categories
    Route::prefix('categories')->group(function(){
        Route::get('/view', [CategoriesController::class, 'CategoriesView'])->name('all.categories');
        Route::post('/store', [CategoriesController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoriesController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update', [CategoriesController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoriesController::class, 'CategoryDelete'])->name('category.delete');

        // Admin Subcategories
        Route::get('/sub/view', [SubCategoriesController::class, 'SubCategoriesView'])->name('all.subcategories');
        Route::post('/sub/store', [SubCategoriesController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoriesController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update', [SubCategoriesController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoriesController::class, 'SubCategoryDelete'])->name('subcategory.delete');

        // Admin Subsubcategories
        Route::get('/sub/sub/view', [SubCategoriesController::class, 'SubSubCategoriesView'])->name('all.subsubcategories');
        Route::post('/sub/sub/store', [SubCategoriesController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubCategoriesController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update', [SubCategoriesController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoriesController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoriesController::class, 'GetSubCategory']); // for the ajax in subsubcategory_view.blade for add SubSubcategory
        Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoriesController::class, 'GetSubSubCategory']); // for the ajax in subsubcategory_view.blade for 'Add new product'
    }); // .Route::prefix('categories')


    // Admin Products
    Route::prefix('products')->group(function(){
        Route::get('/add', [ProductsController::class, 'AddProduct'])->name('add.product');
        Route::post('/store', [ProductsController::class, 'ProductStore'])->name('product.store');
        Route::get('/view', [ProductsController::class, 'ProductsView'])->name('all.products');
        Route::get('/view/{id}', [ProductsController::class, 'ProductView'])->name('product.view');
        Route::get('/edit/{id}', [ProductsController::class, 'ProductEdit'])->name('product.edit');
        Route::post('/update', [ProductsController::class, 'ProductUpdate'])->name('product.update');
        Route::get('/delete/{id}', [ProductsController::class, 'ProductDelete'])->name('product.delete');
        Route::post('/multiimage/update', [ProductsController::class, 'ProductMultiImageUpdate'])->name('product.multiimage.update');
        Route::get('/multiimage/delete/{id}', [ProductsController::class, 'ProductMultiImageDelete'])->name('product.multiimage.delete');
        Route::post('/thumbnail/update', [ProductsController::class, 'ProductThumbnailImageUpdate'])->name('product.thumbnail.update');
        Route::get('/activate/{id}', [ProductsController::class, 'ProductActivate'])->name('product.activate');
        Route::get('/deactivate/{id}', [ProductsController::class, 'ProductDeactivate'])->name('product.deactivate');
    }); // Route::prefix('products')


    // Admin Slider
    Route::prefix('slider')->group(function(){
        Route::get('/view', [SliderController::class, 'SliderView'])->name('manage.slider');
        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
        Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
        Route::get('/activate/{id}', [SliderController::class, 'SliderActivate'])->name('slider.activate');
        Route::get('/deactivate/{id}', [SliderController::class, 'SliderDeactivate'])->name('slider.deactivate');
    }); // .Route::prefix('slider')

}); // end Route::middleware(['auth:admin'])->group(function(){.......});




/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// User login
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id; // Getting the loged in user id
    $user = User::find($id); // All the data for this specific user
    return view('dashboard', compact('user'));
})->name('dashboard');

// User logout
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

// User profile
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change_password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/change_password/store', [IndexController::class, 'UserChangePasswordStore'])->name('user.change.password.store');




/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// Multi Language
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/bulgarian', [LanguageController::class, 'Bulgarian'])->name('bulgarian.language');

// Product Details
Route::get('/product/details/{id}/{slug_en}', [IndexController::class, 'ProductDetails']); // don't need name, because it has been use by url('...')


// Subcategories wise data
Route::get('/{cat_slug_en}/{subcat_slug_en}/{subcat_id}/products', [IndexController::class, 'SubCategoryProducts']); // don't need name, because it has been use by url('...')
