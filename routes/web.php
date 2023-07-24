<?php

use Illuminate\Support\Facades\Route;

$ctrl = '\App\Http\Controllers';
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


Route::get('/', function () {
    return redirect('login');
});


//Register user
Route::get('register', $ctrl.'\RegisterController@index')->name('verified.account.form');
Route::post('register', $ctrl.'\RegisterController@Register')->name('verified.account.link');

//Register admin
Route::get('registeradmin', $ctrl.'\RegisterAdminController@index')->name('verified.admin_account.form');
Route::post('registeradmin', $ctrl.'\RegisterAdminController@RegisterAdmin')->name('verified.admin_account.link');

// Route::post('register','');

Route::get('forgot_password', $ctrl.'\PasswordController@index')->name('forgot.password.form');
Route::post('forgot_password', $ctrl.'\PasswordController@sendResetLink')->name('forgot.password.link');

Route::get('reset_password/reset/{token}', $ctrl.'\PasswordController@index2')->name('reset.password.form');
Route::post('reset_password/reset', $ctrl.'\PasswordController@resetPassword')->name('reset.password');

Route::get('user_store', $ctrl.'\RegisterController@RegisterLink')->name('store.user');
Route::get('admin_store', $ctrl.'\RegisterAdminController@RegisterLinkAdmin')->name('admin.user');

Route::get('login',$ctrl.'\LoginController@index')
->middleware('guest')
->name('login');

Route::post('proses_login', $ctrl.'\LoginController@authenticate');
Route::post('proses_login_admin', $ctrl.'\LoginAdminController@authenticateAdmin');


//Route::get('admin', $ctrl.'\LoginAdminController@dashboard_admin')->middleware('Cek_admin:admin');
// Route::get('staff', $ctrl.'\LoginController@dashboard_staff')->middleware('cek_login:staff');
// Route::get('home', $ctrl.'\LoginController@dashboard_home')->middleware('cek_login:home');

// Route::get('/admin/edit/{id}', $ctrl.'\UserController@edit')->middleware('cek_login:admin');

// router admin
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {

        Route::get('admin', 'App\Http\Controllers\LoginController@dashboard_admin');
        Route::get('admin/edit/{id}','App\Http\Controllers\UserController@edit');
        Route::post('admin/edit','App\Http\Controllers\UserController@update');
        Route::get('admin/delete/{id}','App\Http\Controllers\UserController@delete');
        Route::post('admin/store','App\Http\Controllers\UserController@store');
        Route::post('account_delete', 'App\Http\Controllers\UserController@update_delete');

        Route::get('member', 'App\Http\Controllers\MemberController@index');
        Route::get('/member/list', 'App\Http\Controllers\MemberController@index2');

        Route::post('web/edit','App\Http\Controllers\SettingController@update');
        Route::get('/web-setting', 'App\Http\Controllers\SettingController@index_web');

        Route::get('member/accept/{id}', 'App\Http\Controllers\MemberController@accept');
        Route::post('member/accept', 'App\Http\Controllers\MemberController@member_accept');

        Route::get('member/delete/{id}', 'App\Http\Controllers\MemberController@delete');
        Route::post('member/delete', 'App\Http\Controllers\MemberController@member_delete');

        Route::get('master/header', 'App\Http\Controllers\MasterController@index_header');
        Route::post('master/header/store', 'App\Http\Controllers\MasterController@store_header');
        Route::get('master/header/edit/{id}', 'App\Http\Controllers\MasterController@index_update');
        Route::post('master/header/edit', 'App\Http\Controllers\MasterController@update_header');
        Route::get('master/header/delete/{id}', 'App\Http\Controllers\MasterController@index_delete');
        Route::post('master/header/delete', 'App\Http\Controllers\MasterController@delete_header');
        //
        Route::get('master/toko', 'App\Http\Controllers\MasterController@index_headertk');
        Route::post('master/toko/store', 'App\Http\Controllers\MasterController@store_headertk');
        Route::get('master/toko/edit/{id}', 'App\Http\Controllers\MasterController@index_updatetk');
        Route::post('master/toko/edit', 'App\Http\Controllers\MasterController@update_headertk');
        Route::get('master/toko/delete/{id}', 'App\Http\Controllers\MasterController@index_deletetk');
        Route::post('master/toko/delete', 'App\Http\Controllers\MasterController@delete_headertk');
        //

        Route::get('/master/detail/{id}', 'App\Http\Controllers\MasterController@index_detail');
        Route::get('/detail', 'App\Http\Controllers\MasterController@index_detail2');
        Route::get('/detail/store/{id}', 'App\Http\Controllers\MasterController@index_detail_store');
        Route::get('/detail/store/', 'App\Http\Controllers\MasterController@index_detail_store2');
        Route::post('/detail/store/', 'App\Http\Controllers\MasterController@store_detail');
        Route::get('/detail/delete/{id}', 'App\Http\Controllers\MasterController@index_detail_delete');
        Route::post('/detail/delete/', 'App\Http\Controllers\MasterController@delete_detail');
        Route::get('/detail/edit/{id}', 'App\Http\Controllers\MasterController@index_detail_update');
        Route::post('/detail/edit', 'App\Http\Controllers\MasterController@update_detail');

        Route::get('categoryitem', 'App\Http\Controllers\ItemController@categoryitem');
        Route::post('/category/store', 'App\Http\Controllers\ItemController@store');
        Route::get('/category/edit/{id}','App\Http\Controllers\ItemController@category_editform');
        Route::post('/category/update','App\Http\Controllers\ItemController@category_update');
        Route::get('/category/delete/{id}','App\Http\Controllers\ItemController@category_deleteform');
        Route::post('/category/delete/','App\Http\Controllers\ItemController@category_delete');

        Route::get('/transaction_hdr','App\Http\Controllers\ItemController@transaction_hdr');
        Route::get('/transaction_edit_status/{id}','App\Http\Controllers\ItemController@edit_status_form');
        Route::post('/status_transaction/edit','App\Http\Controllers\ItemController@edit_status_transaction');
        Route::get('/transaction_dtl','App\Http\Controllers\ItemController@transaction_dtl');
        Route::get('/transaction_detail/{id}','App\Http\Controllers\ItemController@transaction_detail');
        Route::get('/payment_detail/{id}','App\Http\Controllers\ItemController@payment_detail');

    });

    Route::group(['middleware' => ['cek_login:staff']], function () {
        Route::get('staff', 'App\Http\Controllers\LoginController@dashboard_staff');
    });

    Route::group(['middleware' => ['cek_login:home']], function () {
        Route::get('home', 'App\Http\Controllers\LoginController@dashboard_home');
        Route::get('detail_product', 'App\Http\Controllers\UserPageController@detail_product');
        Route::get('cart', 'App\Http\Controllers\UserPageController@cart');
        Route::get('wishlist', 'App\Http\Controllers\UserPageController@wishlist');

        Route::get('flash_sale', 'App\Http\Controllers\UserPageController@flash_sale');
        Route::get('/product/more', 'App\Http\Controllers\UserPageController@product_more');

        Route::get('/product-info/{id}', 'App\Http\Controllers\UserPageController@detail_info');
        Route::get('/wishlist/add/{id}', 'App\Http\Controllers\UserPageController@wishlist_add');

        Route::get('/add_cart/{id}', 'App\Http\Controllers\UserPageController@add_cart');
        Route::get('/cart', 'App\Http\Controllers\UserPageController@cart');

        Route::post('/checkout','App\Http\Controllers\Api\Payment\XenditController@store');

        Route::get('/item_cart/increa/{id}', 'App\Http\Controllers\UserPageController@item_cart_increa');
        Route::get('/item_cart/decrea/{id}', 'App\Http\Controllers\UserPageController@item_cart_decrea');

        Route::get('/item_cart/delete/{id}', 'App\Http\Controllers\UserPageController@item_cart_delete');

        Route::get('/transaction_user/ongoing', 'App\Http\Controllers\UserPageController@transaction_ongoing');
        Route::get('/transaction_user/cancel/{id}', 'App\Http\Controllers\UserPageController@cancel_transaction');
        Route::get('/transaction_user/receive/{id}', 'App\Http\Controllers\UserPageController@receive_transaction');
        Route::get('/transaction_user/detail/{id}', 'App\Http\Controllers\UserPageController@detail_transaction');

        Route::get('/transaction_user/done', 'App\Http\Controllers\UserPageController@transaction_done');
        Route::get('/transaction_user/payment', 'App\Http\Controllers\UserPageController@transaction_payment');

        Route::get('/profile_settings','App\Http\Controllers\UserController@usersettings');
        Route::get('/password_change','App\Http\Controllers\PasswordController@index_password');
        Route::post('/password_change','App\Http\Controllers\PasswordController@resetPassword2');
        Route::get('/editprofile_form','App\Http\Controllers\UserController@editprofile_show');
        Route::post('/editprofile_edit','App\Http\Controllers\UserController@editprofile_update');

        Route::post('cart/address/select','App\Http\Controllers\UserPageController@cart_address_select');

        Route::get('/address/list','App\Http\Controllers\UserController@address_list');
        Route::post('/address/select','App\Http\Controllers\UserController@address_select');
        Route::post('/address/add','App\Http\Controllers\UserController@address_add');
        Route::get('/address/edit/{id}','App\Http\Controllers\UserController@address_edit_form');
        Route::post('/address/edit','App\Http\Controllers\UserController@address_edit');
        Route::post('/address/delete','App\Http\Controllers\UserController@address_delete');

        Route::post('member_request','App\Http\Controllers\UserController@member_request');
    });
});

//Route Admin
Route::get('loginadmin',$ctrl.'\LoginAdminController@index')
-> middleware('guest')
->name('loginadmin');



Route::get('logout',$ctrl.'\LogoutController@logout');


// ini juga masih draft tp function controllernya udah works


