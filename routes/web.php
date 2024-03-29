<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function() {
    return view('home');
})->name('home');

Route::prefix('/login')->group(function() {
    Route::get('/', [AuthController::class, 'show'])->middleware('guest')->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/logout', [AuthController::class, 'logout']);

Route::prefix('/members')->middleware('auth')->group(function() {
    Route::get('/', [MemberController::class, 'index']);
    Route::get('/create', [MemberController::class, 'create']);
    Route::post('/', [MemberController::class, 'store']);
    Route::get('/{memberId}/edit', [MemberController::class, 'edit']);
    Route::put('/{memberId}', [MemberController::class, 'update']);
    Route::delete('/{memberId}', [MemberController::class, 'delete']);
});

Route::prefix('/payments')->middleware('auth')->group(function() {
    Route::get('/{memberId}', [PaymentController::class, 'index']);
    Route::post('/{memberId}', [PaymentController::class, 'create']);
});

// dinamic routing
Route::get('/halo/{nama?}', function($nama = 'Dunia') {
    return 'Halo ' . $nama;
});
