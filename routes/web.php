<?php

use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\ClassConst;

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
Route::get('/',[StudentController::class,'login'])->name('login');
Route::get('/login/process',[StudentController::class,'loginProcess'])->name('login.process');

Route::group(['middleware' => ['auth']], function(){

    
    
   

Route::get('/home',[StudentController::class,'home'])->name('home');
Route::get('/index',[StudentController::class,'index'])->name('index');
Route::get('/create',[StudentController::class,'create'])->name('student.create');
Route::post('/store',[StudentController::class,'store'])->name('store');
Route::get('/edit/student/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/update/student/{id}',[StudentController::class,'update'])->name('update.student');
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('student.delete');

/// Route for Student Class

Route::get('/create/class',[StudentClassController::class,'classCreate'])->name('class.create');
Route::post('/class/store',[StudentClassController::class,'classStore'])->name('class.store');
//Route::post('/search/class/',[StudentController::class,'search'])->name('search.class');
Route::get('/edit/class/{id}',[StudentClassController::class,'classEdit'])->name('class.edit');
///Settings
Route::get('/create/settings',[StudentController::class,'setting'])->name('settings');
///Route::get('/edit/setting/{id}',[StudentController::class,'editSetting'])->name('edit.setting');
Route::get('/logout',[StudentController::class,'logout'])->name('logout');
});