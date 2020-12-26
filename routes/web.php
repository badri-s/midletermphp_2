<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [WebController::class, 'main'])->name('web.home');
Route::get('/category/{id}', [WebController::class, 'getNewsByCatID'])->name('web.catByNews');



// for production version, disable registration
// Auth::routes(['register' => false]);

// for debug version
Auth::routes();


Route::get('/admin', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->prefix("/admin")->group(function () {

    Route::post('/news/create', [HomeController::class, 'createNews'])->name('news.create');
    Route::post('/category/create', [HomeController::class, 'createCategory'])->name('cat.create');
    Route::get('/news/publish/{id}', [HomeController::class, 'publishNewsByid'])->name('news.publish');

});
