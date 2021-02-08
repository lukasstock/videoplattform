<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/lessons/create', function () {
    return view('lessons/create');
});

Route::post('/lessons/home','Lessons\LessonsController@save');
Route::get('/lessons/index','Lessons\LessonsController@show');

Route::post('/chapters/save', 'Chapters\ChaptersController@create');
Route::post('/lessons/chapters/index','Chapters\ChaptersController@show');
Route::post('/chapters/video','Chapters\ChaptersController@show');
Route::post('/chapters/create','Chapters\ChaptersController@create');
Route::post('/chapters/save','Chapters\ChaptersController@save');


Route::post('/chapter/manage','VideoController@show');
Route::post('/video','VideoController@index');
Route::post('/video/save','VideoController@save');
Route::post('/video/delete','VideoController@delete');
