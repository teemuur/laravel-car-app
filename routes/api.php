<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\Company'], function (){
    Route::post('/companies', 'StoreController')->name('company.store');
    Route::get('/companies', 'IndexController')->name('company.index');
    Route::get('/companies/create', 'CreateController')->name('company.create');
    Route::get('/companies/{company}', 'ShowController')->name('company.show');
    Route::get('/companies/{company}/edit', 'EditController')->name('company.edit');
    Route::patch('/companies/{company}', 'UpdateController')->name('company.update');
    Route::delete('/companies/{company}', 'DestroyController')->name('company.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Car'], function (){
    Route::get('/cars', 'IndexController')->name('car.index');
    Route::get('/cars/create', 'CreateController')->name('car.create');
    Route::post('/cars', 'StoreController')->name('car.store');
    Route::get('/cars/{car}', 'ShowController')->name('car.show');
    Route::get('/cars/{car}/edit', 'EditController')->name('car.edit');
    Route::patch('/cars/{car}', 'UpdateController')->name('car.update');
    Route::delete('/cars/{car}', 'DestroyController')->name('car.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Property'], function (){
    Route::get('/properties', 'IndexController')->name('property.index');
    Route::get('/properties/create', 'CreateController')->name('property.create');
    Route::post('/properties', 'StoreController')->name('property.store');
    Route::get('/properties/{property}', 'ShowController')->name('property.show');
    Route::get('/properties/{property}/edit', 'EditController')->name('property.edit');
    Route::patch('/properties/{property}', 'UpdateController')->name('property.update');
    Route::delete('/properties/{property}', 'DestroyController')->name('property.delete');
});
