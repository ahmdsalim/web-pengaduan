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

Route::get('/', function () {
	$artikel = App\Models\Article::where('status','publish')->orderBy('created_at','desc')->paginate(3);
	$quotes = App\Models\Quotes::all();
    return view('home',compact('artikel','quotes'));
})->name('landing');

Route::get('/profil-kami',function() {
   return view('profile'); 
})->name('profil');

Auth::routes(['login','logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::name('admin.')->group(function() {
		Route::resource('/users','UserController')->middleware('role:1')->except('index');
		Route::resource('/users','UserController');
		Route::get('/change-password','UserController@editPass')->name('editpass');
		Route::put('/change-password/{id}','UserController@changePassword')->name('changepass');
		Route::name('artikel.')->prefix('artikel')->group(function() {
			Route::get('/','ArticleController@index')->name('index');
			Route::put('/update/{id}','ArticleController@update')->name('update');
			Route::delete('/delete/{id}','ArticleController@destroy')->name('destroy');
			Route::get('/add','ArticleController@add')->name('add');
			Route::get('/edit/{id}','ArticleController@edit')->name('edit');
			Route::get('/publish/{id}','ArticleController@publish')->name('publish');
			Route::get('/drafted/{id}','ArticleController@drafted')->name('drafted');
			Route::get('/pratinjau/{id}','ArticleController@pratinjau')->name('pratinjau');
		});
		Route::resource('/quotes','QuotesController');
		Route::resource('/setting','SettingController');
		Route::name('pengaduan.')->prefix('pengaduan')->group(function(){
			Route::get('/','PengaduanController@admin')->name('index');
			Route::get('/delete/{id}','PengaduanController@destroy')->name('destroy');
			Route::post('/export','PengaduanController@export')->name('export');
		});
		Route::name('setting.')->prefix('settings')->group(function(){
			Route::get('/','SettingController@index')->name('index');
			Route::put('/update','SettingController@update')->name('update');
		});
	});

});
Route::name('artikel.')->group(function(){
	Route::get('/artikel','ArticleController@articles')->name('index');
	Route::get('/artikel/{slug}','ArticleController@show')->name('show');
});
Route::name('pengaduan.')->group(function(){
	Route::get('/pengaduan','PengaduanController@index')->name('index');
	Route::post('/pengaduan/submit','PengaduanController@store')->name('store');
});
Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('home');
Route::group(['prefix' => 'zap-filemanager', 'middleware' => ['web','auth']], function(){
	\UniSharp\LaravelFilemanager\Lfm::routes();
});
