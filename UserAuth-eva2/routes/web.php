<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProjectController;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::get('dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::post('/validate-password', function(Request $request) {
    $user = Auth::user();
    $password = $request->input('password');

    if (Hash::check($password, $user->password)) {
        return response()->json(['valid' => true]);
    } else {
        return response()->json(['valid' => false]);
    }
})->name('validate.password');

Route::resource('proyects', ProjectController::class);
