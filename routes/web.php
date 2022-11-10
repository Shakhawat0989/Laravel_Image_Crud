<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCrudController;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/',[ImageCrudController::class,'all_products'])->name('all.product');
Route::get('/add-new-product',[ImageCrudController::class,'add_new_products'])->name('add.product');
Route::post('/store-product',[ImageCrudController::class,'store_products'])->name('store.product');
Route::get('/edit-product/{id}',[ImageCrudController::class,'edit_products'])->name('edit.product');
Route::post('/update-product/{id}',[ImageCrudController::class,'update_products'])->name('update.product');
Route::get('/delete-product/{id}',[ImageCrudController::class,'delete_products'])->name('delete.product');
