<?php

use App\Models\Member;
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
});

Route::get('/members', function() {
    $members = Member::all();

    return view('member', [ 'members' => $members ]);
});

Route::get('/members/{memberId}/edit', function($memberId) {
    $member = Member::find($memberId);

    return view('member_edit', ['member' => $member]);
});

// dinamic routing
Route::get('/halo/{nama?}', function($nama = 'Dunia') {
    return 'Halo ' . $nama;
});
