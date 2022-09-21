<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Frontend\IndexController;
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

// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Admin Dashboard 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

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
});


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


});






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

