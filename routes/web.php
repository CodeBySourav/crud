<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {

Route::get('/index',function (){
    return view('index');
});
Route::post('/user_submit',[UserController::class,'user_submit_post']);
Route::get('/deshboard',function (){
    return view('deshboard');
});
Route::get('/load_all_data',[UserController::class,'load_all_data']);
Route::get('/user_delete/{id}',[UserController::class,'user_delete'])->name('user_delete.name');
Route::get('/update/{id}',[UserController::class,'update'])->name('update.name');
Route::post('/update_user_data',[UserController::class,'update_user_data']);

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
