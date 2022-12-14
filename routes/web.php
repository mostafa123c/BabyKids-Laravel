<?php

use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/courses', [HomeController::class, 'courses'])->name('user.courses');
Route::get('/teachers', [HomeController::class, 'teachers'])->name('user.teachers');
Route::get('/teacher', [TeacherController::class, 'teacher']);



Route::get('/admin/login' , [AuthController::class , 'loginPage'])->name('admin.loginPage');
Route::post('/admin/login' , [AuthController::class , 'login'])->name('admin.login');

Route::group(['prefix'=>'admin' , 'as'=>'admin.' , 'middleware'=>'auth'],function(){

    Route::get('/',[AdminHomeController::class,'index' ])->name('index');
    Route::post('logout' , [AuthController::class , 'logout'])->name('logout');


    Route::group(['prefix'=>'faq' , 'as'=>'faq.'],function (){
        Route::get('/',[AdminFaqController::class ,'index'])->name('all');
        Route::get('/create',[AdminFaqController::class ,'create'])->name('create');
        Route::post('/store' ,[AdminFaqController::class , 'store'])->name('store');
        Route::delete('/delete',[AdminFaqController::class ,'delete'])->name('delete');
        Route::get('/edit/{faqid}',[AdminFaqController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminFaqController::class ,'update'])->name('update');

    });

    Route::group(['prefix'=>'slider' , 'as'=>'slider.'],function (){
        Route::get('/' , [AdminSliderController::class , 'index'])->name('all');
        Route::get('/create' , [AdminSliderController::class , 'create'])->name('create');
        Route::post('/store' , [AdminSliderController::class , 'store'])->name('store');
        Route::delete('/delete',[AdminSliderController::class ,'delete'])->name('delete');
        Route::get('/edit/{sliderid}',[AdminSliderController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminSliderController::class ,'update'])->name('update');

    });

    Route::group(['prefix'=>'activity' , 'as'=>'activity.'],function (){
        Route::get('/' , [AdminActivityController::class , 'index'])->name('all');
        Route::get('/create' , [AdminActivityController::class , 'create'])->name('create');
        Route::post('/store' , [AdminActivityController::class , 'store'])->name('store');
        Route::delete('/delete',[AdminActivityController::class ,'delete'])->name('delete');
        Route::get('/edit/{activityid}',[AdminActivityController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminActivityController::class ,'update'])->name('update');

    });

    Route::group(['prefix'=>'course' , 'as'=>'course.'],function (){
        Route::get('/' , [AdminCourseController::class , 'index'])->name('all');
        Route::get('/create' , [AdminCourseController::class , 'create'])->name('create');
        Route::post('/store' , [AdminCourseController::class , 'store'])->name('store');
        Route::delete('/delete',[AdminCourseController::class ,'delete'])->name('delete');
        Route::get('/edit/{courseid}',[AdminCourseController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminCourseController::class ,'update'])->name('update');
    });

    Route::group(['prefix'=>'teacher' , 'as'=>'teacher.'],function (){
        Route::get('/' , [AdminTeacherController::class , 'index'])->name('all');
        Route::get('/create' , [AdminTeacherController::class, 'create'])->name('create');
        Route::post('/store' , [AdminTeacherController::class, 'store'])->name('store');
        Route::delete('/delete',[AdminTeacherController::class,'delete'])->name('delete');
        Route::get('/edit/{teacherid}',[AdminTeacherController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminTeacherController::class ,'update'])->name('update');
    });


});





