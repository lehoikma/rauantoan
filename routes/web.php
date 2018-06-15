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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index')->name('home_admin');
    Route::get('login', 'IndexController@formLogin')->name('form_login');
    Route::post('login', 'IndexController@login')->name('admin_login');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/top', 'IndexController@top')->name('admin_top');
    Route::get('/tao-danh-muc-san-pham', 'ProductsController@registerCategoryProduct')->name('register_category_product');
    Route::post('/save-danh-muc-san-pham', 'ProductsController@saveCategoryProduct')->name('save_category_product');
    Route::get('/xoa-danh-muc-san-pham/{id}', 'ProductsController@deleteCategoryProduct')->name('delete_category_product');
    Route::get('/sua-danh-muc-san-pham/{id}', 'ProductsController@showEditCategoryProduct')->name('show_edit_category_product');
    Route::post('/sua-danh-muc-san-pham', 'ProductsController@editCategoryProduct')->name('edit_category_product');

    // Tao-San-Pham
    Route::get('/tao-san-pham', 'ProductsController@registerProduct')->name('register_product');
    Route::get('/danh-sach-san-pham', 'ProductsController@listProduct')->name('list_product');
    Route::post('/luu-san-pham', 'ProductsController@saveProduct')->name('save_register_product');
    Route::get('/xoa-san-pham/{id}', 'ProductsController@deleteProduct')->name('delete_product');
    Route::get('/sua-san-pham/{id}', 'ProductsController@showEditProduct')->name('show_edit_product');
    Route::post('/sua-san-pham', 'ProductsController@editProduct')->name('edit_product');
    // Tin-Tuc
    Route::get('/tao-danh-muc-tin-tuc', 'NewsCategoryController@registerNewsCategory')->name('register_category_news');
    Route::post('/save-danh-muc-tin-tuc', 'NewsCategoryController@saveNewsCategory')->name('save_category_news');
    Route::get('/xoa-danh-muc-tin-tuc/{id}', 'NewsCategoryController@deleteNewsCategory')->name('delete_category_news');
    Route::get('/sua-danh-muc-tin-tuc/{id}', 'NewsCategoryController@showEditNewsCategory')->name('show_edit_category_news');
    Route::post('/sua-danh-muc-tin-tuc', 'NewsCategoryController@editNewsCategory')->name('edit_category_news');

    Route::get('/tao-tin-tuc', 'NewsController@formCreateNews')->name('form_create_news');
    Route::post('/tao-tin-tuc', 'NewsController@createNews')->name('create_news');
    Route::get('/danh-sach-tin-tuc', 'NewsController@listNews')->name('list_news');
    Route::get('/sua-tin-tuc/{id}', 'NewsController@showEditNews')->name('show_edit_news');
    Route::post('/sua-tin-tuc', 'NewsController@editNews')->name('edit_news');
    Route::get('/xoa-tin-tuc/{id}', 'NewsController@deleteNews')->name('delete_news');

    // Hoi-Dap
    Route::get('/tu-van', 'SupportController@listQuestion')->name('list_question');
    Route::get('/sua-tu-van/{id}', 'SupportController@editQuestion')->name('edit_question');

    //Hinh-Anh
    Route::get('/tao-danh-muc-hinh-anh', 'ImagesController@createCategoryImage')->name('create_category_image');
    Route::post('/save-danh-muc-hinh-anh', 'ImagesController@saveCategoryImage')->name('save_category_image');
    Route::get('/xoa-danh-muc-hinh-anh/{id}', 'ImagesController@deleteCategoryImage')->name('delete_category_image');
    Route::get('/sua-danh-muc-hinh-anh/{id}', 'ImagesController@showEditCategoryImage')->name('show_edit_category_image');
    Route::post('/sua-danh-muc-hinh-anh', 'ImagesController@editCategoryImage')->name('edit_category_image');

    Route::get('/tao-hinh-anh', 'ImagesController@registerImage')->name('register_image');
    Route::post('/luu-hinh-anh', 'ImagesController@saveImage')->name('save_register_image');
    Route::get('/danh-sach-hinh-anh', 'ImagesController@listImage')->name('list_images');
    Route::get('/sua-hinh-anh/{id}', 'ImagesController@showEditImage')->name('show_edit_image');
    Route::post('/sua-hinh-anh', 'ImagesController@editImage')->name('edit_image');
    Route::get('/xoa-hinh-anh/{id}', 'ImagesController@deleteImage')->name('delete_image');

    // Videos
    Route::get('/tao-videos', 'VideosController@registerVideos')->name('register_videos');
    Route::post('/luu-videos', 'VideosController@saveVideos')->name('save_register_videos');
    Route::get('sua-videos/{id}', 'VideosController@formEditVideo')->name('form_edit_videos');
    Route::post('/sua-videos', 'VideosController@editVideo')->name('save_edit_videos');
    Route::get('/danh-sach-videos', 'VideosController@listVideos')->name('list_videos');
    Route::get('/xoa-videos/{id}', 'VideosController@deleteVideos')->name('delete_videos');

    Route::get('/logout', 'IndexController@logout')->name('admin_logout');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/tin-tuc', 'NewsController@index')->name('news_list');
    Route::get('/tin-tuc/post/{title}/{id}', 'NewsController@detail')->name('news_detail');
    Route::get('/tin-tuc/category/{id}', 'NewsController@listNewsCategory')->name('list_news_category');
    Route::get('/tu-van', 'SupportController@index')->name('form_support');
    Route::post('/tu-van', 'SupportController@saveQuestion')->name('save_question');
    Route::get('/san-pham', 'NewsProductController@listNewsProduct')->name('list_news_products');
    Route::get('/san-pham/category/{id}', 'NewsProductController@listNewsProductCategory')->name('list_news_products_category');
    Route::get('/san-pham/{title}/{id}', 'NewsProductController@detail')->name('detail_news_products');
    Route::get('/hinh-anh', 'ImageController@listImage')->name('list_image');
    Route::get('/videos', 'VideosController@listVideos')->name('videos');
});
