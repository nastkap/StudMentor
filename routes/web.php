<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   
    Route::controller(DocumentController::class)->prefix('documents')->group(function () {
        Route::get('', 'index')->name('documents');
        Route::get('create', 'create')->name('documents.create');
        Route::post('store', 'store')->name('documents.store');
        Route::get('show/{id}', 'show')->name('documents.show');
        Route::get('edit/{id}', 'edit')->name('documents.edit');
        Route::put('edit/{id}', 'update')->name('documents.update');
        Route::delete('destroy/{id}', 'destroy')->name('documents.destroy');
       

    });
   

    
    Route::controller(QuestionController::class)->prefix('questions')->group(function () {
        Route::get('', 'index')->name('questions');
        Route::get('create', 'create')->name('questions.create');
        Route::post('store', 'store')->name('questions.store');
        Route::get('edit/{id}', 'edit')->name('questions.edit');
        Route::put('edit/{id}', 'update')->name('questions.update');
        Route::delete('destroy/{id}', 'destroy')->name('questions.destroy');
    
    });



     
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
















