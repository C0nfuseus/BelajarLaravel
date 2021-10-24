<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MailController;
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
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');
Route::get('/user/savemail', [MainController::class, 'user_savemail'])->name('user.savemail');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::get('/user/index', [MainController::class, 'index'])->name('user.index');
Route::get('/user/edit/{id}', [MainController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [MainController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [MainController::class, 'destroy'])->name('user.destroy');
// Route::resource('user', MainController::class);

Route::post('/mail/save', [MailController::class, 'save'])->name('mail.save');
Route::get('/mail/maildata', [MailController::class, 'maildata'])->name('mail.savemail');
Route::get('/mail/index', [MailController::class, 'index'])->name('mail.index');
Route::get('/mail/edit/{id}', [MailController::class, 'edit'])->name('mail.edit');
Route::post('/mail/update/{id}', [MailController::class, 'update'])->name('mail.update');
Route::delete('/mail/{id}', [MailController::class, 'destroy'])->name('mail.destroy');


Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/user/dashboard', [MainController::class, 'user_dashboard'])->name('user.dashboard');
});
