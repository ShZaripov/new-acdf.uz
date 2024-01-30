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

// use App\Http\Controllers\FormController;

// use App\Http\Controllers\ContactController;

use App\Http\Controllers\FormController;
use \Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localize' ] // Route translate middleware
],
function() {

	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
	Route::get('/', 'FormController@index')->name('home');
	//exportExcel
	Route::get('/exportExcel', 'FormController@exportExcel')->name('exportExcel');
	Route::post('/subscribers', 'MainController@subscriber')->name('subscribers');
	Route::get('/search', 'MainController@search')->name('site.search');
	Route::get('/contacts', 'MainController@contacts')->name('site.contacts');
    Route::get('/vacancies', 'MainController@vacancies')->name('site.vacancies');
	// Route::post('/form/submit' , 'FormController@contactForm')->name('contact.form');
	Route::resource('/form', "FormController");
	
	Route::get('/activities', 'ActivityController@index')->name('site.activities');
	Route::get('/programs', 'ProgramsController@index')->name('site.programs');
	Route::get('/programs/{id}', 'ProgramsController@show')->name('site.programs.show');
	Route::get('/news', 'NewsController@index')->name('site.news');
	//	Route::get('/news/{id}', 'NewsController@show')->name('site.news.show');
	Route::get('/news/{name}', 'NewsController@show')->name('site.news.show');
	// Route::get('publications', 'PublicationsController@index')->name('site.publications');
	// Route::get('/publications/{id}', 'PublicationsController@show')->name('site.publications.show');
	Route::get('/pages/{name}', 'PagesController@show')->name('site.pages.show');
	Route::get('/photos', 'PhotosController@index')->name('site.photos');
	Route::get('/photos/{id}', 'PhotosController@show')->name('site.photos.show');
	Route::get('/videos', 'VideosController@index')->name('site.videos');
	Route::get('/videos/{video}', 'VideosController@show')->name('site.videos.show');
	
	Route::post('/contact/submit', 'MainController@contactSubmit')->name('site.contact.submit');

	// Route::get('/employees', 'EmployeesController@index')->name('site.employees');

	Route::group([ 'prefix' => 'admin', 'middleware' => ['auth'] ], function () {

	    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
	    Route::resource('/programs', 'Admin\ProgramsController');
	    Route::resource('/pages', 'Admin\PagesController');
	    Route::resource('/publications', 'Admin\PublicationsController');
	    // Route::resource('/news-subjects', 'Admin\NewsSubjectsController');
	    Route::resource('/news', 'Admin\NewsController');
	    Route::resource('/menu', 'Admin\MenuController');
	    Route::get('/menu/{menu}/create-item', 'Admin\MenuController@create_item')->name('menu.create-item');
	    Route::post('/menu/{menu}/create-store', 'Admin\MenuController@store_item')->name('menu.store-item');
	    Route::get('/menu/{menu}/create-item/{item}/edit', 'Admin\MenuController@edit_item')->name('menu.edit-item');
	    Route::put('/menu/{menu}/create-item/{item}', 'Admin\MenuController@update_item')->name('menu.update-item');
	    Route::resource('/textblocks', 'Admin\TextBlocksController');
	    Route::resource('/photos', 'Admin\PhotosController');
	    Route::resource('/videos', 'Admin\VideosController');
	    Route::resource('/employees', 'Admin\EmployeesController');
	    Route::resource('/social-networks', 'Admin\SocialNetworksController');
	    Route::resource('/mainbanners', 'Admin\BannersController');
	    Route::resource('/users', 'Admin\UsersController', ['middleware' => ['role:admin']]);
	    Route::resource('/roles', 'Admin\RolesController', ['middleware' => ['role:admin']]);
	    Route::resource('/options', 'Admin\OptionsController', ['middleware' => ['role:admin']]);
	    Route::resource('/albums', 'Admin\AlbumsController');
	    Route::get('/image/create/{id}', 'Admin\ImageController@create')->name('image.create');
	    Route::post('/image/store', 'Admin\ImageController@store')->name('image.store');
	    Route::put('/image/update/{id}', 'Admin\ImageController@update')->name('image.update');
	    Route::post('/image/destroy/{id}', 'Admin\ImageController@destroy')->name('image.destroy');
	    Route::post('/image/move/{id}', 'Admin\ImageController@move')->name('image.move');
	    Route::get('/{type}/blocks', 'Admin\BlocksController@index')->name('blocks.index.filter');
	    Route::resource('/blocks', 'Admin\BlocksController');
	    Route::resource('/activities', 'Admin\ActivityController');
	    Route::resource('/categories', 'Admin\CategoryController');
	    Route::resource('/tags', 'Admin\TagController');
		
		Route::get("/showMessages", "ShowMessageController@index")->name("showMessage.index");

//	  Route::get('/albums', 'Admin\AlbumsController@index')->name('albums');
//	  Route::get('/albums/create', 'Admin\AlbumsController@create');
//	  Route::post('/albums/store', 'Admin\AlbumsController@store');
//	  Route::get('/albums/test', 'Admin\AlbumsController@test');
	  // Route::get('/dispatch', 'Admin\DispatchController@index')->name('dispatch');
	  // Route::post('/dispatch/send', 'Admin\DispatchController@send')->name('dispatch.send');
	  // Route::get('/dispatch/subscribers', 'Admin\DispatchController@subscribers')->name('dispatch.subscribers');

	});

});
