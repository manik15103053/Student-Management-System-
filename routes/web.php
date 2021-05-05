<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisonController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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
Route::post('/update/class/{id}',[StudentClassController::class,'classUpdate'])->name('update.class');
Route::get('/class/delete/{id}',[StudentClassController::class,'classDelete'])->name('class.delete');
////Route for Teacher
Route::get('/create/teaher',[TeacherController::class,'createTeacher'])->name('teacher.create');
Route::post('/store/teacher',[TeacherController::class,'storeTeacher'])->name('teacher.store');
Route::get('/edit/teacher/{id}',[TeacherController::class,'editTeacher'])->name('teacher.edit');
Route::post('/update/teacher/{id}',[TeacherController::class,'updateTeacher'])->name('teacher.update');
Route::get('/delete/teacher/{id}',[TeacherController::class,'deleteTeacher'])->name('teacher.delete');


///Route For Section///
Route::get('/create/section',[SectionController::class,'createSection'])->name('section.create');
Route::post('/store/section',[SectionController::class,'storeSection'])->name('section.store');
Route::get('/edit/section/{id}',[SectionController::class,'editSection'])->name('section.edit');
Route::post('/update/section/{id}',[SectionController::class,'updateSecion'])->name('update.section');
Route::get('/delete/section/{id}',[SectionController::class,'deleteSection'])->name('section.delete');


///Route for Subject//
Route::get('/create/subject',[SubjectController::class,'createSubject'])->name('subject.create');
Route::post('/store/subject',[SubjectController::class,'storeSubject'])->name('subject.store');
Route::get('/edit/subject/{id}',[SubjectController::class,'editSubject'])->name('subject.edit');
Route::post('/update/subject/{id}',[SubjectController::class,'updateSubject'])->name('subject.update');
Route::get('/delete/subject/{id}',[SubjectController::class,'deleteSubject'])->name('subject.delete');


///Route for Result//
Route::get('/create/result',[ResultController::class,'createResult'])->name('result.create');
Route::post('/store/result',[ResultController::class,'storeResult'])->name('result.store');
Route::get('/edit/result/{id}',[ResultController::class,'editResult'])->name('result.edit');
Route::post('/update/result/{id}',[ResultController::class,'updateResult'])->name('result.update');
Route::get('/delete/result/{id}',[ResultController::class,'deleteResult'])->name('result.delete');
///Division Route//////
Route::get('/create/division',[DivisonController::class,'createDivision'])->name('division.create');
Route::post('/store/division',[DivisonController::class,'storeDivision'])->name('division.store');
Route::get('/edit/division/{id}',[DivisonController::class,'divisionEdit'])->name('division.edit');
Route::post('/update/division/{id}',[DivisonController::class,'divisionUpdate'])->name('division.update');
Route::get('/division/delete/{id}',[DivisonController::class,'divisionDelete'])->name('division.delete');


///Route for District
Route::get('/create/district',[DistrictController::class,'createDistrict'])->name('district.create');
Route::post('/store/district',[DistrictController::class,'storeDistrict'])->name('district.store');
Route::get('/edit/district/{id}',[DistrictController::class,'editDistrict'])->name('district.edit');
Route::post('/update/district/{id}',[DistrictController::class,'updateDistrict'])->name('district.update');
Route::get('/delete/district/{id}',[DistrictController::class,'deleteDistrict'])->name('district.delete');
///Settings
Route::get('/create/settings',[StudentController::class,'setting'])->name('settings');
Route::post('/update/profile',[StudentController::class,'updateProfile'])->name('update.profile');

//Search Route//
Route::get('/search',[ResultController::class,'search'])->name('search');
Route::get('/view/student/{id}',[ResultController::class,'viewStudent'])->name('student.view');
Route::get('/logout',[StudentController::class,'logout'])->name('logout');
});