<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePassController;
use App\Models\User;
use App\Models\Category;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    $brands = DB::table('brands')->get();

    $about = DB::table('home_abouts')->first();

    $images = Multipic::all();
    return view('home', compact('brands', 'about', 'images'));
});

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::get('/category/update/{id}', [CategoryController::class, 'Update'])->name('update.category');

Route::get('/SoftDeletes/category/{id}', [CategoryController::class, 'SoftDeletes']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

/// For Brand

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

/**
 * Multi Image Route
 * 
 */

Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');

Route::post('/store/image', [BrandController::class, 'StoreImg'])->name('store.image');


/**
 * Admin All Route
 */
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');


Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider'])->name('edit.slider');
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider'])->name('update.slider');
/**
 * Home About All Route
 */
Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/About', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/About', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/about/update/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);
/**
 * Home Service All Route
 */
Route::get('/home/Service', [ServiceController::class, 'HomeService'])->name('home.service');
/**
 * Home Porfolio Page Route
 */
Route::get('/porfolio', [AboutController::class, 'Porfolio'])->name('porfolio');

/**
 *  Admin Contact Page Route
 */
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');

/**
 * Home Contact Page Route
 */
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    // $users = User::all();
    // $users = DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');


Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

/***
 * 
 * 
 * Change password and user profile route
 */
Route::get('/user/password', [ChangePassController::class, 'CPassWord'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');

/**
 * User Profile
 */
Route::get('/user/profile', [ChangePassController::class, 'PUpdate'])->name('profile.update');
Route::post('/user/profile/update', [ChangePassController::class, 'UpdateProfile'])->name('update.user.profile');