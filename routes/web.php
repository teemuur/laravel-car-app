<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();
// Добавьте это ↓
Route::post('register', [RegisterController::class, 'register'])
    ->middleware('restrictothers');
// Страница создания токена
Route::get('dashboard', function () {
    if(Auth::check() && Auth::user->role === 1){
        return auth()
            ->user()
            ->createToken('auth_token', ['admin'])
            ->plainTextToken;
    }
    return redirect("/");
})->middleware('auth');




