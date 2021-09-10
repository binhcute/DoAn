<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => 'levellogin'], function () {
    //Server
    Route::resource('/admin', 'ServerController');
    Route::resource('/MyAccount', 'MyAccountController')->except('destroy');
    //Product
    Route::resource('/SanPham', 'ProductController');
    Route::get('/XoaSanPham/{SanPham}', 'ProductController@destroy');
    Route::put('/SanPham/change_status/{SanPham}', 'ProductController@change_status');
    //Cate
    Route::resource('/LoaiSanPham', 'CategoryController');
    Route::get('/XoaLoaiSanPham/{LoaiSanPham}', 'CategoryController@destroy');
    Route::post('SuaLoaiSanPham/{LoaiSanPham}', 'CategoryController@update')->name('SuaLoaiSanPham');
    Route::put('/LoaiSanPham/change_status/{LoaiSanPham}', 'CategoryController@change_status');
    //Article
    Route::resource('/BaiViet', 'ArticleController');
    Route::get('/XoaBaiViet/{LoaiBaiViet}', 'ArticleController@destroy');
    Route::put('/BaiViet/change_status/{BaiViet}', 'ArticleController@change_status');
    //Order
    Route::resource('/HoaDon', 'OrderController')->only('index', 'show');
    Route::put('/HoaDon/danggiao/{HoaDon}', 'OrderController@update_status_0');
    Route::put('/HoaDon/xuly/{HoaDon}', 'OrderController@update_status_1');
    Route::put('/HoaDon/thanhcong/{HoaDon}', 'OrderController@update_status_2');
    Route::put('/HoaDon/huy/{HoaDon}', 'OrderController@update_status_3');
    //Portfolio
    Route::resource('/NhaCungCap', 'PortfolioController');
    Route::get('/XoaNhaCungCap/{NhaCungCap}', 'PortfolioController@destroy');
    Route::put('/NhaCungCap/change_status/{NhaCungCap}', 'PortfolioController@change_status');
    //CMT
    Route::resource('/BinhLuan', 'CommentController')->except('store');
    Route::put('/BinhLuan/change_status/{BinhLuan}', 'CommentController@change_status');
    //Account
    Route::resource('/TaiKhoan', 'AccountController');
    Route::put('/TaiKhoan/change_status/{TaiKhoan}', 'AccountController@change_status');

    //Slider

    // Route::resource('/Slider','SliderController');
    // Route::get('/XoaSlider/{Slider}','SliderController@destroy');
    // Route::put('/Slider/disabled/{Slider}','SliderController@disabled');
    // Route::put('/Slider/enabled/{Slider}','SliderController@enabled');
    //Menu
    //Event
    // //Logo
    // Route::resource('/Logo','LogoController');
    // Route::put('/Logo/disabled/{Logo}','LogoController@disabled');
    // Route::put('/Logo/enabled/{Logo}','LogoController@enabled');


    //Report
    Route::get('/Report', 'ReportController@index');

    //API
    Route::get('/QuanLyAPI', 'ServerController@api');
    //Upload Ckeditor
    Route::post('ckeditor/upload', 'ServerController@ckeditorUpload')
        ->name('ckeditor.upload');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', 'Api\AccountController@index')->name('login');

Route::post('/login', 'Api\AccountController@login');
Auth::routes([
    'register' => false,
    'login' => false,
]);
// Route::post('/logout','Api\AccountController@customLogout')->middleware('auth:api')->name('logout');
Route::post('/register', 'Api\AccountController@register')->name('register');
Route::get('/user', 'Api\AccountController@userInfo')->middleware('auth:api');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('LoginCheck', 'CheckLoginController@check');

Route::post('/DatHang', 'CheckOutController@store')->name('Dat-Hang');
Route::resource('/BinhLuan', 'CommentController')->only('store');
//Client
Route::resource('/', 'ClientController');

Route::get('/about_us', 'ClientController@about_us');
Route::get('/checkout', 'ClientController@check_out');
Route::get('/contact_us', 'ClientController@contact_us');
Route::get('Tai-Khoan', 'ClientController@my_account')
    ->name('Tai-Khoan')
    ->middleware('levellogin');

//Brand
Route::get('/Nha-Cung-Cap/{slug}-{id}', 'ClientController@portfolio_list')
    ->where('slug', '[a-zA-Z0-9-_]+')
    ->where('id', '[0-9]+')
    ->name('Nha-Cung-Cap');
Route::get('Nha-Cung-Cap', 'ClientController@portfolio_detail')
    ->name('Danh-Sach-Nha-Cung-Cap');

//Categories
Route::get('/Danh-Muc', 'ClientController@categories_detail')
    ->name('Danh-Sach-Danh-Muc');
Route::get('/Danh-Muc/{slug}-{id}', 'ClientController@categories_list')
    ->where('slug', '[a-zA-Z0-9-_]+')
    ->where('id', '[0-9]+')
    ->name('Danh-Muc');

//Product
Route::get('/San-Pham', 'ClientController@product')
    ->name('Danh-Sach-San-Pham');
Route::get('/San-Pham/{slug}-{id}', 'ClientController@product_detail')
    ->where('slug', '[a-zA-Z0-9-_]+')
    ->where('id', '[0-9]+')
    ->name('San-Pham');

//Article
Route::get('/Bai-Viet/{slug}-{id}', 'ClientController@article_detail')
    ->where('slug', '[a-zA-Z0-9-_]+')
    ->where('id', '[0-9]+')
    ->name('Bai-Viet');
Route::get('/Bai-Viet', 'ClientController@article')
    ->name('Danh-Sach-Bai-Viet');

//Update Account
Route::resource('/TaiKhoan', 'AccountController')->only('update');

//Cart
Route::resource('/cart', 'CartController')->only('index', 'store');
Route::get('/item-cart/{id}', 'CartController@AddCart');
Route::get('San-Pham/item-cart/{id}/{qty}', 'CartController@AddCartDT');
Route::get('/delete-item-cart/{id}', 'CartController@DeleteItemCart');
Route::get('/delete-item-list-cart/{id}', 'CartController@DeleteItemListCart');
Route::get('/save-item-list-cart/{id}/{qty}', 'CartController@SaveItemListCart');
// Route::post('/AddCartDT/{id}','CartController@AddCartDT');


//Favỏite
Route::resource('/favorite', 'FavoriteController')->only('index');
Route::get('/item-favorite/{id}', 'FavoriteController@AddFavorite');
Route::get('/item-favorite-dt/{id}/{qty}', 'FavoriteController@AddFavoriteDT');
Route::get('/delete-item-favorite/{id}', 'FavoriteController@DeleteItemFavorite');
Route::get('/delete-item-list-favorite/{id}', 'FavoriteController@DeleteItemListFavorite');
Route::get('/save-item-list-favorite/{id}/{qty}', 'FavoriteController@SaveItemListFavorite');

//search

Route::get('tim-kiem', 'SearchController@autocomplete')->name('tim-kiem');

//Mail
Route::get('mail', 'ServerController@sendMail');
