<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;


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
Route::prefix('guest/projects')->name('guest.projects.')->group(function(){
    
});
Route::get('/', [GuestProjectController::class, 'home'])->name('home');

Route::middleware('auth')->prefix('admin/projects')->name('admin.projects.')->group(function(){
    Route::get('/index', [AdminProjectController::class , 'index'])->name('index');
    Route::get('/show/{project}', [AdminProjectController::class , 'show'])->name('show');
    Route::get('/edit/{project}/edit',[AdminProjectController::class, 'edit'])->name('edit');
    Route::PUT('/update/{project}',[AdminProjectController::class, 'update'])->name('update');
    Route::post('/',[AdminProjectController::class, 'store'])->name('store');
    Route::get('/create',[AdminProjectController::class, 'create'])->name('create');
    Route::delete('/{project}',[AdminProjectController::class , 'destroy'])->name('destroy');
});
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
