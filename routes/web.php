<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'KiemTra_Admin_User'], function () {
    //Server
    Route::resource('/admin', 'ServerController');
    Route::resource('/MyAccount', 'MyAccountController')->except('destroy');
    //Product
    Route::resource('/SanPham', 'ProductController');
    Route::get('/XoaSanPham/{SanPham}', 'ProductController@destroy');
    Route::post('SuaSanPham/{SanPham}', 'ProductController@update')->name('SuaSanPham');
    Route::put('/SanPham/change_status/{SanPham}', 'ProductController@change_status');
    //Cate
    Route::resource('/LoaiSanPham', 'CategoryController');
    Route::get('/XoaLoaiSanPham/{LoaiSanPham}', 'CategoryController@destroy');
    Route::post('SuaLoaiSanPham/{LoaiSanPham}', 'CategoryController@update')->name('SuaLoaiSanPham');
    Route::put('/LoaiSanPham/change_status/{LoaiSanPham}', 'CategoryController@change_status');
    //Article
    Route::resource('/BaiViet', 'ArticleController');
    Route::get('/XoaBaiViet/{LoaiBaiViet}', 'ArticleController@destroy');
    Route::post('SuaBaiViet/{BaiViet}', 'ArticleController@update')->name('SuaBaiViet');
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
    Route::post('SuaNhaCungCap/{SuaNhaCungCap}','PortfolioController@update')->name('SuaNhaCungCap');
    Route::put('/NhaCungCap/change_status/{NhaCungCap}', 'PortfolioController@change_status');
    //CMT
    Route::resource('/BinhLuan', 'CommentController')->except('store');
    Route::put('/BinhLuan/change_status/{BinhLuan}', 'CommentController@change_status');
    //Account
    Route::resource('/TaiKhoan', 'AccountController');
    Route::put('/TaiKhoan/change_status/{TaiKhoan}', 'AccountController@change_status');
    Route::get('/TaiKhoanAdmin','AccountController@admin_list')->name('QuanLyTaiKhoanAdmin');
    Route::put('/TaiKhoan/change_status/{TaiKhoan}', 'AccountController@change_status');
    Route::put('/TaiKhoan/change_status_admin/{TaiKhoan}', 'AccountController@change_status_admin');
    Route::get('/XoaTaiKhoan/{TaiKhoan}','AccountController@destroy');
    Route::get('/XoaTaiKhoanAdmin/{TaiKhoan}','AccountController@destroy_admin');
    
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

    //Promotion
    Route::resource('/KhuyenMai','PromotionController');
    Route::get('/XoaKhuyenMai/{KhuyenMai}', 'PromotionController@destroy');
    Route::post('SuaKhuyenMai/{KhuyenMai}', 'PromotionController@update')->name('SuaKhuyenMai');

    //Report
    Route::get('/Report', 'ReportController@index');

    //API
    Route::get('/QuanLyAPI', 'ServerController@api');
    //Upload Ckeditor
    Route::post('ckeditor/upload', 'ServerController@ckeditorUpload')
        ->name('ckeditor.upload');
});

//Đăng Nhập

Route::post('LoginCheck', 'CheckLoginController@check');

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout','AuthController@logout')->name('logout');
Route::post('/register', 'AuthController@register')->name('register');

Route::get('/verifyAccount', 'AuthController@verifyAccount')->name('verifyAccount');

Route::get('/QuenMatKhau','AuthController@getQuenMatKhau')->name('getQuenMatKhau');
Route::post('/QuenMatKhau','AuthController@postQuenMatKhau')->name('postQuenMatKhau');
Route::post('/LayLaiMatKhau','AuthController@postNhapOtp')->name('post.otp');
Route::post('/DatLaiMatKhau','AuthController@postDatLaiMatKhau')->name('post.datmatkhau');

// Route::get('Dang-Ky','AuthController@registerContinue')->name('registerContinue');
// Route::get('/QuenMatKhau-otp','AuthController@getQuenMatKhau')->name('get.otp');
//

Route::post('/DatHang', 'CheckOutController@store')->name('Dat-Hang');
Route::resource('/BinhLuan', 'CommentController')->only('store');
//Client
Route::resource('/', 'ClientController');

Route::get('/about_us', 'ClientController@about_us');
Route::get('/contact_us', 'ClientController@contact_us');
//Kiểm tra đăng nhập
Route::group(['middleware' => 'KiemTraDangNhap'], function () {

Route::get('/checkout', 'ClientController@check_out');
//Thong tin tai khoan
Route::get('Tai-Khoan', 'ClientController@my_account')
    ->name('Tai-Khoan');
Route::post('post-thay-doi-thong-tin-nguoi-dung','ClientController@change_my_account')->name('post.change_account');

Route::post('post-thay-doi-mat-khau','ClientController@post_change_password')->name('post.change_password');
});



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

Route::get('/tim-kiem/name', 'SearchController@searchProductByName');

Route::get('/tim-kiem-bai-viet/name', 'SearchController@searchArticleByName');

// Route::get('donhangg', 'SearchController@donhangg')->name('donhangg');

// Route::get('test',function(){
//     event(new App\Events\MyEvent('welcome'));
//     return "Event has been sent";
// });

// Route::get('test',function(){
//     return view('test');
// });

// Route::post('test',function(){
//     $message = request()->product_name;

//     event(new MyEvent($message));
// })->name('post.test');