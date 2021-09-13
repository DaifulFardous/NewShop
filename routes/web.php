<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses'=>'NewShopController@index',
    'as'=>'/'
]);
Route::get('/products/{id}', [
    'uses'=>'NewShopController@products',
    'as'=>'/products'
]);
Route::get('/products1', [
    'uses'=>'NewShopController@products1',
    'as'=>'/products1'
]);
Route::get('product/details/{id}/',[
    'uses'=>'NewShopController@productDetails',
    'as'=>'product-details'
]);
Route::get('/checkout', [
    'uses'=>'NewShopController@checkout',
    'as'=>'/checkout'
]);
Route::get('/login', [
    'uses'=>'NewShopController@login',
    'as'=>'/login'
]);
Route::get('/registration', [
    'uses'=>'NewShopController@registration',
    'as'=>'/registration'
]);
Route::get('/contact', [
    'uses'=>'NewShopController@contact',
    'as'=>'/contact'
]);
Route::get('/single', [
    'uses'=>'NewShopController@single',
    'as'=>'/single'
]);
Route::get('/table', [
    'uses'=>'AdminController@table',
    'as'=>'/table'
]);
Route::get('/AddCategory', [
    'uses'=>'AdminController@AddCategory',
    'as'=>'/AddCategory'
]);
Route::get('/ManageCategory', [
    'uses'=>'AdminController@ManageCategory',
    'as'=>'/ManageCategory'
]);
Route::post('/category/save', [
    'uses'=>'AdminController@saveCategory',
    'as'=>'/new-category'
]);
Route::get('/category/unpublished/{id}', [
    'uses'=>'AdminController@unpublishedCategory',
    'as'=>'unpublished-category'
]);
Route::get('/category/published/{id}', [
    'uses'=>'AdminController@publishedCategory',
    'as'=>'published-category'
]);
Route::get('/category/edit/{id}', [
    'uses'=>'AdminController@editCategory',
    'as'=>'edit-category'
]);
Route::post('/category/update', [
    'uses'=>'AdminController@updateCategory',
    'as'=>'/update-category'
]);
Route::get('/category/delete/{id}', [
    'uses'=>'AdminController@deleteCategory',
    'as'=>'delete-category'
]);
Route::get('/add/brand', [
    'uses'=>'BrandController@addBrand',
    'as'=>'/add/brand'
]);
Route::get('/manage/brand', [
    'uses'=>'BrandController@manageBrand',
    'as'=>'/manage/brand'
]);
Route::post('/brand/save', [
    'uses'=>'BrandController@saveBrand',
    'as'=>'/new-brand'
]);
Route::get('/unpublish/brand/{id}', [
    'uses'=>'BrandController@unpublishBrand',
    'as'=>'unpublish-brand'
]);
Route::get('/publish/brand/{id}', [
    'uses'=>'BrandController@publishBrand',
    'as'=>'publish-brand'
]);
Route::get('/edit/brand/{id}', [
    'uses'=>'BrandController@editBrand',
    'as'=>'edit-brand'
]);
Route::post('/update/brand', [
    'uses'=>'BrandController@updateBrand',
    'as'=>'update/brand'
]);
Route::get('/delete/brand/{id}', [
    'uses'=>'BrandController@deleteBrand',
    'as'=>'delete-brand'
]);
Route::get('/product/add', [
    'uses'=>'ProductController@addProduct',
    'as'=>'/add/product'
]);
Route::post('/product/save', [
    'uses'=>'ProductController@saveProduct',
    'as'=>'new-product'
]);
Route::get('/manage/product',[
   'uses'=>'ProductController@manageProduct',
    'as'=>'/manage/product'
]);
Route::get('/product/unpublish/{id}',[
   'uses'=> 'ProductController@unpublishProduct',
    'as'=>'unpublish-product'
]);
Route::get('/product/publish/{id}',[
   'uses'=> 'ProductController@publishProduct',
    'as'=>'publish-product'
]);
Route::get('/product/edit/{id}',[
   'uses'=> 'ProductController@editProduct',
    'as'=>'edit-product'
]);
Route::get('product/delete/{id}',[
   'uses'=>'ProductController@deleteProduct',
   'as'=>'delete-product'
]);
Route::post('product/update',[
   'uses'=>'ProductController@updateProduct',
   'as'=>'update-product'
]);
Route::post('cart/add',[
   'uses'=>'CartController@addToCart',
   'as'=>'add-to-cart'
]);
Route::get('cart/show',[
   'uses'=>'CartController@showCart',
   'as'=>'show-cart'
]);
Route::get('cart/delete/{rowId}',[
   'uses'=>'CartController@deleteCart',
   'as'=>'delete-cart-item'
]);
Route::post('cart/update',[
   'uses'=>'CartController@updateCart',
   'as'=>'update-cart'
]);
Route::get('cart/checkout',[
   'uses'=>'CartController@checkoutCart',
   'as'=>'checkout-cart'
]);
Route::post('customer/registration',[
    'uses'=>'CheckoutController@customerRegistration',
    'as'=>'customer-registration'
]);
Route::post('customer/login',[
    'uses'=>'CheckoutController@customerLogin',
    'as'=>'customer-login'
]);
Route::get('customer/logout',[
    'uses'=>'CheckoutController@customerLogout',
    'as'=>'customer-logout'
]);
Route::get('customer/login/new',[
    'uses'=>'CheckoutController@newCustomerLogin',
    'as'=>'new-customer-login'
]);
Route::get('checkout/shipping',[
    'uses'=>'CheckoutController@shippingForm',
    'as'=>'checkout-shipping'
]);
Route::post('shipping/save',[
    'uses'=>'CheckoutController@saveShippingInfo',
    'as'=>'new-shipping'
]);
Route::get('checkout/payment',[
    'uses'=>'CheckoutController@paymentForm',
    'as'=>'checkout-payment'
]);
Route::post('checkout/order',[
    'uses'=>'CheckoutController@newOrder',
    'as'=>'new-order'
]);
Route::get('/complete/order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'
]);
Route::get('/manage/order',[
    'uses'=>'OrderController@manageOrder',
    'as'=>'manage-order',
    'middleware'=> 'Bitm'
]);
Route::get('/order/details/{id}',[
    'uses'=>'OrderController@viewOrder',
    'as'=>'view-order-details'
]);
Route::get('/order/view/invoice/{id}',[
    'uses'=>'OrderController@viewInvoice',
    'as'=>'view-order-invoice'
]);
Route::get('/order/download/invoice/{id}',[
    'uses'=>'OrderController@downloadInvoice',
    'as'=>'download-order-invoice'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
