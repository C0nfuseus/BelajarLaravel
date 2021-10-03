<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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


Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/user/save', [MainController::class, 'user_save'])->name('user.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');
Route::get('/user/savemail',[MainController::class, 'user_savemail'])->name('user.savemail');
Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');
Route::get('/user/{$id_user}/index',[MainController::class, 'index'])->name('user.index');
Route::get('/user/{$id_user}/edit',[MainController::class, 'edit'])->name('user.edit');
Route::patch('/user/{$id_user}',[MainController::class, 'update'])->name('user.update');
Route::delete('/user/{$id_user}',[MainController::class, 'destroy'])->name('user.destroy');
// Route::resource('user', MainController::class);

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/user/{$id_user}/dashboard',[MainController::class, 'user_dashboard'])->name('user.dashboard');
    
});