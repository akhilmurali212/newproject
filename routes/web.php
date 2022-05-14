<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/user-dashboard', function () {
    return view('User.index');
})->middleware(['auth'])->name('user.dashboard');

Route::group(['middleware' => 'auth' ,'prefix' => 'profile'], function () {
    Route::get('/dashboard', [ProfileController::class,'profile'])->name('profile');
    Route::get('/{id}', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/{id}', [ProfileController::class,'update'])->name('profile.update');
});



require __DIR__.'/auth.php';
