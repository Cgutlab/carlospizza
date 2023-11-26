<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/*
Route::get('/', function () {
    return view('welcome');
})->name('index');
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\Adm\HomeController::class, 'index'])->name('home');

Route::prefix('adm')->group(function(){
    Route::get('/', [App\Http\Controllers\Adm\LoginController::class, 'login'])->name('adm.auth.login');
    Route::post('login', [App\Http\Controllers\Adm\LoginController::class, 'auth'])->name('adm.auth.auth');
    Route::get('dashboard', [App\Http\Controllers\Adm\AdminController::class, 'index'])->name('adm.dashboard');
    Route::post('logout', [App\Http\Controllers\Adm\LoginController::class, 'logout'])->name('adm.auth.logout');
    
    Route::resource('admin', App\Http\Controllers\Adm\AdminController::class);
    Route::resource('orders', App\Http\Controllers\Adm\OrderController::class);
    Route::resource('pizzas', App\Http\Controllers\Adm\PizzaController::class);
    Route::resource('ingredients', App\Http\Controllers\Adm\IngredientController::class);
});