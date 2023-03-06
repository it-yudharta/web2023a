<?php

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
});

Route::get('/members', function() {
    // SELECT * FROM members
    $members = Member::all();

    return view('member', [ 'members' => $members ]);
});

Route::get('/members/create', function() {
    return view('member_create');
});

Route::post('/members', function(Request $request) {
    $request->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'address' => ['required', 'string'],
        'phone' => ['required', 'digits_between:10,13'],
    ]);

    // INSERT INTO members(...) values (...)
    $member = new Member;
    $member->name = $request->name;
    $member->age = $request->age;
    $member->address = $request->address;
    $member->phone = $request->phone;
    $member->save();

    return redirect('/members');
});

Route::get('/members/{memberId}/edit', function($memberId) {
    // SELECT * FROM members WHERE id = 3
    $member = Member::find($memberId);

    return view('member_edit', ['member' => $member]);
});

Route::put('/members/{memberId}', function(Request $request, $memberId) {
    $request->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'address' => ['required', 'string'],
        'phone' => ['required', 'digits_between:10,20'],
    ]);

    $member = Member::find($memberId);
    $member->name = $request->name;
    $member->age = $request->age;
    $member->address = $request->address;
    $member->phone = $request->phone;
    $member->save();

    return redirect('/members');
});

Route::delete('/members/{memberId}', function(Request $request, $memberId) {
    $member = Member::find($memberId);
    $member->delete();

    return redirect('/members');
});

// dinamic routing
Route::get('/halo/{nama?}', function($nama = 'Dunia') {
    return 'Halo ' . $nama;
});
