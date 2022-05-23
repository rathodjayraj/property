<?php

use App\Http\Controllers\Create_newController;
use App\Http\Controllers\PostrequirementController;
use App\Http\Controllers\PaymentlistController;


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

Route::get('/create_new',[Create_newController::class,'create_new'])->name('create_new');

Route::post('/create_new_property',[Create_newController::class,'create_new_property'])->name('create_new_property');

Route::get('/propertylist',[Create_newController::class,'propertylist'])->name('propertylist');
Route::get('/userlist',[Create_newController::class,'userlist'])->name('userlist');
Route::get('/properties/edit/{id}',[Create_newController::class,'properties_edit'])->name('properties_edit');
Route::post('/properties_edit_page',[Create_newController::class,'properties_edit_page'])->name('properties_edit_page');

Route::get('/testimonial',[Create_newController::class,'testimonial'])->name('testimonial');
Route::post('/testimonial/save',[Create_newController::class,'save'])->name('testimonial.save');
Route::get('/delete/{id}',[Create_newController::class,'delete'])->name('testimonial.delete');

Route::get('postyourrequirement',[PostrequirementController::class,'postyourrequirement'])->name('postyourrequirement');
Route::post('postrequirement',[PostrequirementController::class,'postrequirement'])->name('postrequirement');
Route::get('paymentlist',[PaymentlistController::class,'Payment_list'])->name('Payment_list');

Route::get('myrequirements',[PostrequirementController::class,'myrequirements'])->name('myrequirements');

Route::get('/requirements_delete/{id}',[PostrequirementController::class,'requirements_delete'])->name('requirements_delete');

Route::get('/detail/{id}',[PostrequirementController::class,'detail'])->name('detail');
