<?php

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


// USERS ROUTES START
Route::get('/', 'IndexController@index');

Route::any('/users/login', 'UsersController@login')->name('login');

Route::get('/users/welcome', 'UsersController@welcome')->name('users-welcome');

Route::any('/users/create', 'UsersController@create')->name('users-create');

Route::get('/users/logout', 'UsersController@logout')->name('logout');

Route::get('/users', 'UsersController@index')->name('users-list');

Route::any('/users/edit/{user}', 'UsersController@edit')->name('users-edit');

Route::get('/users/delete/{user}', 'UsersController@delete')->name('users-delete');

Route::any('/users/change-password/{user}', 'UsersController@changePassword')->name('users-change-password');

Route::any('/users/password-recovery', 'UsersController@passwordRecovery')->name('users-password-recovery');

Route::any('/users/password-reset/{token}', 'UsersController@passwordReset')->name('users-password-reset');
// USERS ROUTES END


// PAGES ROUTES START
Route::any('/pages/create', 'PagesController@create')->name('pages-create');

Route::get('/pages', 'PagesController@index')->name('pages-list');

Route::any('/pages/edit/{page}', 'PagesController@edit')->name('pages-edit');

Route::get('/pages/delete/{page}', 'PagesController@delete')->name('pages-delete');

Route::get('/pages/delete-image/{page}', 'PagesController@deleteImage')->name('pages-delete-image');

Route::get('/pages/change-status/{page}', 'PagesController@changeStatus')->name('pages-change-status');
// PAGES ROUTES END

// MENUS ROUTES START
Route::any('/menus/create', 'MenusController@create')->name('menus-create');

Route::get('/menus/{menu?}', 'MenusController@index')->name('menus-list');

Route::post('/menus/reorder', 'MenusController@reorder')->name('menus-reorder');

Route::any('/menus/edit/{menu}', 'MenusController@edit')->name('menus-edit');

Route::get('/menus/change-status/{menu}', 'MenusController@changeStatus')->name('menus-change-status');

Route::get('/menus/delete/{menu}', 'MenusController@delete')->name('menus-delete');

// MENUS ROUTES END


// FRONTEND ROUTES START
Route::get('/page/{page}/{slug}', 'OpenController@page');

Route::post('/contact-form', 'OpenController@contactForm')->name('contact-form');
// FRONTEND ROUTES END

// PRODUCT_CATEGORIES ROUTES START
Route::any('/products/category/create', 'Products\CategoriesController@create')->name('products-category-create');

Route::any('/products/category/{category?}', 'Products\CategoriesController@index')->name('products-category-list');

Route::any('/products/category/edit/{category}', 'Products\CategoriesController@edit')->name('products-category-edit');

Route::get('/products/category/change-status/{category}', 'Products\CategoriesController@changeStatus')->name('products-category-change-status');

Route::get('/products/category/delete-image/{category}', 'Products\CategoriesController@deleteImage')->name('products-category-delete-image');

Route::get('/products/category/delete/{category}', 'Products\CategoriesController@delete')->name('products-category-delete');
// PRODUCT_CATEGORIES ROUTES END

// PRODUCT ROUTES START
Route::any('/products/create', 'Products\ProductsController@create')->name('products-create');

Route::any('/products/{product?}', 'Products\ProductsController@index')->name('products-list');

Route::any('/products/edit/{product}', 'Products\ProductsController@edit')->name('products-edit');

Route::get('/products/change-status/{product}', 'Products\ProductsController@changeStatus')->name('products-change-status');

Route::get('/products/delete-image/{product}', 'Products\ProductsController@deleteImage')->name('products-delete-image');

Route::get('/products/delete/{product}', 'Products\ProductsController@delete')->name('products-delete');


// PRODUCT ROUTES END
//PRODUCTS PRICES ROUTE START
Route::any('/products/prices/create','Products\PricesController@create')->name('products-prices-create');

Route::any('/products/prices/index','Products\PricesController@index')->name('products-prices-list');

Route::any('/products/prices/edit/{price}','Products\PricesController@edit')->name('products-prices-edit');

Route::any('/products/prices/delete/{price}','Products\PricesController@delete')->name('products-prices-delete');
//PRODUCTS PRICES ROUTE END
//OPEN ROUTES START
Route::any('/proizvodi/{category?}/{slug?}', 'OpenController@products')->name('products');

Route::any('/proizvod/{product}', 'OpenController@product')->name('product');
//OPEN ROUTES END

Route::any('/mattress', 'OpenController@mattress')->name('mattress');


