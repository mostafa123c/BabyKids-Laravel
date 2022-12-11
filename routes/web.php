<?php

use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSliderController;
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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix'=>'admin' , 'as'=>'admin.'],function(){

    Route::get('/',[AdminHomeController::class,'index' ])->name('index');

    Route::group(['prefix'=>'faq' , 'as'=>'faq.'],function (){
        Route::get('/',[AdminFaqController::class ,'index'])->name('all');
        Route::get('/create',[AdminFaqController::class ,'create'])->name('create');
        Route::post('/store' ,[AdminFaqController::class , 'store'])->name('store');
        Route::delete('/delete',[AdminFaqController::class ,'delete'])->name('delete');
        Route::get('/edit/{faqid}',[AdminFaqController::class ,'edit'])->name('edit');
        Route::put('/update',[AdminFaqController::class ,'update'])->name('update');

    });

    //slider routes
    Route::get('/slider/create' , [AdminSliderController::class , 'create'])->name('slider.create');
    Route::post('/slider/store' , [AdminSliderController::class , 'store'])->name('slider.store');

});





