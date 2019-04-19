<?php
use App\Notifications\SendEmails;
use App\User;
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

Route::resource('lib','LibController');

Route::get('appointment/{token}/{status}', 'LibController@update');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::get('/sendemail/{id}', 'test@hotmail.com');
Route::get('/home', 'LibController@index')->name('home');

Route::get('/test', 'HomeController@test')->name('test');

