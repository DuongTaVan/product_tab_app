<?php
/*
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, X-CSRF-Token, x-test-header, Origin, X-Requested-With, Content-Type, Accept' );
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
*/
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
    return view('welcome');
});

//Proxy
Route::get('/proxy', 'AppProxyController@index')->middleware('auth.proxy');
Route::get('/proxy/post-all', 'AppProxyController@post_all')->middleware('auth.proxy');
Route::get('/proxy/post-all/detail/{id}', 'AppProxyController@post_detail')->middleware('auth.proxy');
Route::get('/proxy/post-all/slider', 'AppProxyController@post_slider')->middleware('auth.proxy');
Route::get('/proxy/category-all', 'AppProxyController@category_all')->middleware('auth.proxy');
Route::get('/proxy/navbar', 'AppProxyController@navbar')->middleware('auth.proxy');
Route::get('/proxy/nav', 'AppProxyController@nav')->middleware('auth.proxy');

//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['web']], function () {
    Route::post('/webhook/shop-redact', 'ProductreviewsController@shopRedact');
    Route::post('/webhook/customers-redact', 'ProductreviewsController@customersRedact');
    Route::post('/webhook/customers-data-request', 'ProductreviewsController@customersDataRequest');
    //payment declined.
    Route::get(
        '/declined',
        'ProductreviewsController@declined'
    )
        ->name('declined');
    //Plan controller
    Route::get('plan', 'PlanController@index')->name('plan');

    //User Guide
    Route::get(
        '/userguide',
        'ProductreviewsController@userguide'
    )
        ->name('userguide');

    Route::post('/publishToTheme', 'ProductreviewsController@publishToTheme')->name('publishToTheme');
    Route::get('/publishToTheme', function () {
        abort(404, 'Page not found');
    });

    //backend
    Route::get(
        '/',
        'ProductreviewsController@index'
    )
        ->middleware(['auth.shop', 'billable'])
        ->name('home');
    Route::get('category', 'CategoryController@index')->name('category.index');
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/edit/{id}', 'CategoryController@update')->name('category.update');
    Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
    Route::get('post', 'PostController@index')->name('post.index');
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post/store', 'PostController@store')->name('post.store');
    Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('post/edit/{id}', 'PostController@update')->name('post.update');
    Route::get('post/delete/{id}', 'PostController@delete')->name('post.delete');
    Route::get('ajax-modal', 'PostController@ajax_modal')->name('post.ajax_modal');
    Route::get('ajax-edit-modal/{id}', 'PostController@ajax_edit_modal')->name('post.ajax_edit_modal');
    Route::get('category-ajax-modal', 'CategoryController@ajax_modal')->name('category.ajax_modal');
    Route::get('category-ajax-edit-modal/{id}', 'CategoryController@ajax_edit_modal')->name('category.ajax_edit_modal');
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::get('setting/update', 'SettingController@update')->name('setting.update');
    Route::get('setting-ajax-modal', 'SettingController@ajax_modal')->name('setting.ajax_modal');
    Route::post('setting/store', 'SettingController@store')->name('setting.store');
    Route::get('add-js', 'SettingController@addScriptToTheme')->name('setting.add-script');
    Route::get('add-js1', 'SettingController@addScriptToTheme1')->name('setting.add-script1');
    Route::get('add-css', 'SettingController@addCssToTheme')->name('setting.add-script');
    Route::get('navbar', 'NavbarController@index')->name('navbar.index');
    Route::get('navbar-ajax-modal', 'NavbarController@ajax_modal')->name('navbar.ajax_modal');
    Route::post('navbar/store', 'NavbarController@store')->name('navbar.store');
    Route::post('navbar/edit/{id}', 'NavbarController@update')->name('navbar.update');
    Route::get('navbar-ajax-edit-modal/{id}', 'NavbarController@ajax_edit_modal')->name('navbar.ajax_edit_modal');
    Route::get('navbar/delete/{id}', 'NavbarController@delete')->name('navbar.delete');
    Route::get('product','ProductController@index')->name('product.index');
    Route::get('product-ajax-modal','ProductController@ajax_modal')->name('product.ajax-modal');
    Route::post('product/store','ProductController@store')->name('product.store');
    Route::get('product-ajax-edit/{id}','ProductController@edit')->name('product.edit');
    Route::post('product/update/{id}','ProductController@update')->name('product.update');
    Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
    Route::get('ajax-product', 'ProductController@frontend_product_ajax')->name('frontend_product_ajax');
    Route::post('search-autocomplete','NavbarController@search_autocomplete')->name('search_autocomplete');
    Route::get('paginate-product-ajax', 'ProductController@paginate_product_ajax')->name('paginate_product_ajax');
    Route::post('search-autocomplete-prd','ProductController@search_autocomplete_prd')->name('search_autocomplete_prd');
    Route::get('navbar/create','NavbarController@create')->name('create.navbar');
    Route::get('paginate-product-navbar-ajax', 'NavbarController@paginate_product_navbar_ajax')->name('paginate_product_navbar_ajax');
    Route::get('navbar/edit/{id}','NavbarController@edit')->name('edit.navbar');
    Route::get('navbar/show/{id}','NavbarController@show')->name('show.navbar');
});
