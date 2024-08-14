<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('/user', [UserController::class, 'me']);
    // Otras rutas protegidas
});

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('/logout', [UserController::class, 'logout']);
});
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('/profile', 'UserController@profile');
});
