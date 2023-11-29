<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NutritionistController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\ChecklistDocsController;


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
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('nutritionist', NutritionistController::class);
        Route::post('nutritionist/client', [NutritionistController::class, 'storeClient'])->name('store.client');
        Route::resource('clients', ClientController::class);
        Route::resource('checklist', ChecklistDocsController::class);
        Route::post('/checklist/files/{id}', [ChecklistDocsController::class, 'insertFiles'])->name('insert.files');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'user'], function(){
        Route::get('user/home', [App\Http\Controllers\HomeControllerUser::class, 'index'])->name('user.home');
        Route::get('user/client', [App\Http\Controllers\HomeControllerUser::class, 'userClient'])->name('user.client');
        Route::get('user/checklist/{id}', [App\Http\Controllers\HomeControllerUser::class, 'userChecklist'])->name('user.checklist');
    });
});