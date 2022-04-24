<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/home', function () {
//     return view('home');
// });
define('PAGINATION_COUNT',10);



Auth::routes(['verify'=>true]);

// Route::get('login',function(){
//     return view('auth.login');
// })->name('log');

Route::group(['prefix'=>'admin'],function(){

});
Route::get('/home', 'usersbook@index')->name('home');
Route::get('/', 'usersbook@index')->name('home');

// Route::get('redirect','HomeController@re');
Route::get('all','bookController@index')->name('all')->middleware('auth:admin');


/*//////////////////////////////////////////////////////////////////////////////*/
Route::post('likebook','usersbook@likebook')->name('like.book');
Route::get('editNoBook/{id}','usersbook@showToeditBookNO')->name('editNo.book');
Route::get('editNoBook','usersbook@showToeditBookNO')->name('editNo.book');
Route::post('updateNoCart','usersbook@updatebooknumber')->name('no.cart.update');
Route::get('deleteIncard/{id}','usersbook@DeletebookCart');



Route::post('showbook','usersbook@showbook')->name('show.book');
Route::post('savebook','usersbook@storbook')->name('store.book');
Route::get('categorybook/{id}','usersbook@getCategoriesBook')->name('category.book');//get data from the first table which i make relashion with it
Route::get('addtocard','usersbook@getcustomerBook');
Route::get('search','usersbook@search');
Route::get('adminsearch','usersbook@adminsearch')->middleware('auth:admin');









Route::get('createcategory','bookController@createcategory')->name('category.create')->middleware('auth:admin');
Route::post('categorystore','bookController@categorystore')->name('category.store')->middleware('auth:admin');
Route::get('categoryshow','bookController@categoryshow')->name('Cat.Show')->middleware('auth:admin');
Route::get('editcate/{id}','bookController@editcat')->name('cat.edit')->middleware('auth:admin');
Route::get('updatecate/{id}','bookController@updatecat')->name('cat.update')->middleware('auth:admin');
Route::post('deletecat','bookController@destroycat')->name('cat.delete')->middleware('auth:admin');


Route::get('create','bookController@create')->name('book.create')->middleware('auth:admin');
Route::post('store','bookController@store')->name('book.store')->middleware('auth:admin');
Route::get('edit/{id}','bookController@edit')->name('book.edit')->middleware('auth:admin');
Route::get('update/{id}','bookController@update')->name('book.update')->middleware('auth:admin');
Route::post('delete','bookController@destroy')->name('book.delete')->middleware('auth:admin');

Route::get('admin/login','Auth\CustomAuthController@adminlogin')->name('admin.login');
Route::post('admin/login','Auth\CustomAuthController@checkadminlogin')->name('save.admin.login');



